import {OrderForm, OrderItem} from "../objects/OrderForm";
import axios from "axios";

export default (): OrderForm => ({
    order: {
        title: '',
        order_items: [],
        owner_id: null,
        get total_price(): string {
            return this.order_items.reduce((total: number, orderItem) => total + Number(orderItem.total_price), 0).toFixed(2);
        },
        set total_price(value) {
            let orderItemsQuantity = this.order_items.reduce((total: number, orderItem) => total + Number(orderItem.quantity), 0);
            let pricePerQuantity = Number(value) / orderItemsQuantity;

            this.order_items.forEach((orderItem: OrderItem) => {
                orderItem.price = Number(pricePerQuantity.toFixed(2));
            })
        }
    },
    validationErrors: [],
    init(): void {
        $('#user_id').on('change.select2', (e): void => {
            this.order.owner_id = e.target.value
        })

        if (this.order.order_items.length === 0) {
            this.addOrderItem()
        }
    },
    addOrderItem(): void {
        this.order.order_items.push({
            id: null,
            order_id: null,
            user_id: null,
            name: '',
            quantity: 1,
            price: 10,
            created_at: null,
            updated_at: null,
            user: null,
            get total_price() {
                return (this.quantity * this.price).toFixed(2)
            },
            set total_price(value: any) {
                this.price = (value / this.quantity).toFixed(2)
            }
        })
    },
    removeOrderItem(orderItem: OrderItem): void {
        this.order.order_items = this.order.order_items.filter(item => item !== orderItem)
    },
    saveImage(event: Event) {
        let file = event.target.files[0]
        let reader = new FileReader()
        reader.readAsDataURL(file)
        reader.onload = () => {
            this.order.image_url = reader.result
        }
        this.order.image = file
    },
    saveOrder(): void {
        let formData = new FormData()
        for (let key in this.order) {
            if (this.order.hasOwnProperty(key) && key !== 'image_url') {
                formData.append(key, this.order[key])
            }

            if (key === 'order_items') {
                this.order.order_items.forEach((orderItem: OrderItem, index: number) => {
                    for (let orderItemKey in orderItem) {
                        if (orderItem.hasOwnProperty(orderItemKey)) {
                            formData.append(`order_items[${index}][${orderItemKey}]`, orderItem[orderItemKey])
                        }
                    }
                })
            }
        }

        axios.post('/orders', formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        }).then(response => {
            window.location.href = response.data.redirect
        }).catch(error => {
            if (error.response.status === 422) {
                this.validationErrors = error.response.data.errors
            } else {
                window.toast(error.response.data.message, 'danger', 'fa fa-times-circle')
            }
        })
    },
    getOrder(): void {
        axios.get('api/v1/orders/' + this.order.id).then(response => {
            console.log(response)
        })
    }
})
