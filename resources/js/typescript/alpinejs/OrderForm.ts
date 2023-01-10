import axios from "axios";
import Order from "../objects/Order";
import OrderItem, {OrderItemInterface} from "../objects/OrderItem";

let laravel_api_token = $('meta[name="api-token"]').attr('content');

axios.defaults.headers.common = {
    'Authorization': `Bearer ${laravel_api_token}`,
    'X-Requested-With': 'XMLHttpRequest'
};

export default () => ({
    order: new Order({
        title: '',
        order_items: [],
        owner_id: null,
        image_url: ''
    }),
    validationErrors: [],
    init(): void {
        this.order.id = Number($(this.$root).attr('data-order-id')) || null;

        if (this.order.id) {
            this.getOrder()
        } else if (this.order.order_items.length === 0) {
            this.addOrderItem()
        }
    },
    addOrderItem(data: OrderItemInterface = {
        name: '',
        quantity: 1,
        price: 10,
    }): void {
        this.order.order_items.push(new OrderItem(data))
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
        axios.get('/api/v1/orders/' + this.order.id).then(response => {
            let orderData = response.data.data

            for (let key in orderData) {
                if (orderData.hasOwnProperty(key) && key !== 'order_items') {
                    this.order[key] = orderData[key]
                } else {
                    orderData[key].forEach((orderItem: OrderItem) => {
                        this.addOrderItem(orderItem)
                    })
                }
            }
        })
    }
})
