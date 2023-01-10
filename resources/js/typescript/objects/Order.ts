import OrderItem from "./OrderItem";

export type OrderInterface = {
    id?: number;
    title: string;
    created_at?: string;
    updated_at?: string;
    order_items: OrderItem[];
    owner_id: number | null;
    image?: typeof Image;
    image_url?: string;
    total_price?: string;
}

class Order implements OrderInterface {
    constructor(data?: OrderInterface) {
        this.id = data.id;
        this.title = data.title;
        this.created_at = data.created_at;
        this.updated_at = data.updated_at;
        this.order_items = data.order_items;
        this.owner_id = data.owner_id;
        this.image_url = data.image_url;
    }

    id?: number;
    created_at: string;
    image: typeof Image;
    image_url: string;
    order_items: OrderItem[];
    owner: User;
    owner_id: number | null;
    title: string;
    updated_at: string;

    get total_price(): string {
        return this.order_items.reduce((total: number, orderItem) => total + Number(orderItem.total_price), 0).toFixed(2);
    };

    set total_price(value) {
        let orderItemsQuantity = this.order_items.reduce((total: number, orderItem) => total + Number(orderItem.quantity), 0);
        let pricePerQuantity = Number(value) / orderItemsQuantity;

        this.order_items.forEach((orderItem: OrderItem) => {
            orderItem.price = Number(pricePerQuantity.toFixed(2));
        })
    }
}

export default Order;
