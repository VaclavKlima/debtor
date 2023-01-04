import './bootstrap';
import Alpine from 'alpinejs'
import livewireDeleteButton from './typescript/alpinejs/LivewireDeleteButton';
import orderForm from "./typescript/alpinejs/OrderForm";

declare global {
    interface Window {
        confirmModal: any;
        toast: any;
        Alpine: Alpine;
    }

    interface Event {
        detail: any;
    }

    interface EventTarget {
        value: any;
        files: any[];
    }
}


window.Alpine = Alpine

Alpine.data('livewireDeleteButton', livewireDeleteButton)
Alpine.data('orderForm', orderForm)
Alpine.start()

interface toastDetail {
    message: string;
    type: string;
    icon: string;
}

$(function () {
    window.addEventListener('livewire:toast', event => {
        let detail: toastDetail = event.detail
        toast(detail.message, detail.type, detail.icon);
    })
})


function toast(
    message: string,
    type: string = 'info',
    icon: string = 'fa fa-info-circle',
) {
    // @ts-ignore
    One.helpers('jq-notify', {type: type, icon: icon, message: message});
}

window.toast = toast
