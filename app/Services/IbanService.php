<?php

namespace App\Services;

class IbanService
{
    public function __construct(public string $bankAccountNumber = '')
    {
        //
    }

    // Generate czech IBAN from bank account number
    public function generateIban(): string
    {
        if ($this->bankAccountNumber === '') {
            throw new \Exception('Bank account number is empty');
        }

        if (!str_contains($this->bankAccountNumber, '/')) {
            $number = substr($this->bankAccountNumber, 0, -4).'/'.substr($this->bankAccountNumber, -4);

        } else {
            $number = $this->bankAccountNumber;
        }
        if (str_contains($this->bankAccountNumber, '-')) {
            $prefix = str_pad(explode('-', $number, 2)[0], 6, 0, STR_PAD_LEFT);
            $bankCode = explode('/', $number, 2)[1];
            $bankAccountNumber = explode('/', explode('-', $number, 2)[1], 2)[0];
        } else {
            $bankCode = explode('/', $number, 2)[1];
            $bankAccountNumber = str_pad(explode('/', $number, 2)[0], 10, 0, STR_PAD_LEFT);
            $prefix = str_pad(str_replace($bankCode, '', substr($bankAccountNumber, 0, -10)), 6, 0, STR_PAD_LEFT);
        }

        $modResult = bcmod($bankCode.$prefix.$bankAccountNumber.'123500', 97);
        $checkSum = 98 - $modResult;
        return 'CZ'.str_pad($checkSum, 2, 0, STR_PAD_LEFT).$bankCode.$prefix.$bankAccountNumber;
    }

    // Validate czech iban number
    public function validateIban(string $iban = null): bool
    {
        if (is_null($iban)) {
            $iban = $this->generateIban();
        }

        if (strlen($iban) < 5) {
            return false;
        }
        $iban = strtolower(str_replace(' ', '', $iban));
        $chars = array_combine(range('a', 'z'), range(10, 35));

        $movedChars = substr($iban, 4).substr($iban, 0, 4);
        $movedCharsArray = str_split($movedChars);
        $newString = '';

        foreach ($movedCharsArray as $key => $value) {
            if (!is_numeric($value)) {
                if (!isset($chars[$value])) {
                    return false;
                }
                $movedCharsArray[$key] = $chars[$value];
            }
            $newString .= $movedCharsArray[$key];
        }

        return bcmod($newString, '97') === '1';
    }


}
