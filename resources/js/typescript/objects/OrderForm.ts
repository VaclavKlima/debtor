import {ValidationError} from "./ValidationError";

export type Order = {
    id?: number;
    title: string;
    created_at?: string;
    updated_at?: string;
    order_items: OrderItem[];

    owner?: User;
    owner_id: number | null;
    image?: typeof Image;
    image_url?: string;
    get total_price(): string;
}

export type OrderItem = {
    id: number;
    order_id: number;
    user_id: number | undefined;
    name: string;
    quantity: number;
    price: number;
    total_price: number | string;
    payment_status?: PaymentStatus;
    created_at: string;
    updated_at: string;
    user: User;

}

export enum PaymentStatus {
    Pending = 'pending',
    PaymentSubmitted = 'payment_submitted',
    Paid = 'paid',
    Failed = 'failed',
}

export type User = {
    id: number;
    name: string;
    email: string;
}

export type OrderForm = {
    order: Order;

    init(): void;

    addOrderItem(): void;

    removeOrderItem(orderItem: OrderItem): void;
    saveImage(event: Event): any;
    saveOrder(): void;

    validationErrors: ValidationError[];

    [key: string]: any;
}
