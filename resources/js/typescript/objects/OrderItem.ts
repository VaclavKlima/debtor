export enum PaymentStatus {
    Pending = 'pending',
    PaymentSubmitted = 'payment_submitted',
    Paid = 'paid',
    Failed = 'failed',
}

export type OrderItemInterface = {
    id?: number;
    order_id?: number;
    user_id?: number | undefined;
    name: string;
    quantity: number;
    price: number;
    total_price?: number | string;
    payment_status?: PaymentStatus;
    created_at?: string;
    updated_at?: string;
}

class OrderItem implements OrderItemInterface {
    constructor(data: OrderItemInterface) {
        this.id = data.id;
        this.order_id = data.order_id;
        this.user_id = data.user_id;
        this.name = data.name;
        this.quantity = data.quantity;
        this.price = data.price;
        this.payment_status = data.payment_status;
        this.created_at = data.created_at;
        this.updated_at = data.updated_at;
    }

    created_at: string;
    id: number;
    name: string;
    order_id: number;
    payment_status: PaymentStatus;
    price: number;
    quantity: number;
    updated_at: string;
    user_id: number | undefined;


    get total_price() {
        return (this.quantity * this.price).toFixed(2)
    };

    set total_price(value: any) {
        this.price = Number((value / this.quantity).toFixed(2))
    }
}

export default OrderItem;
