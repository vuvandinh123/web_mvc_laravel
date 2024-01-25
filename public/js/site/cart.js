function renderCart(data) {
    let html = ''
    let totalPrice = 0
    let totalCartPrice = 0
    $.each(data, function (index, value) {
        totalPrice = value.price * value.quanty
        totalCartPrice += totalPrice;
        html += `
         <div class="row border-bottom py-md-5 py-3 ">
                    <div class="col-md-6 d-flex">
                        <div class="cart-img me-5">
                            <img src="images/products/${value.image}"
                                alt="" />
                        </div>
                        <div class="cart-content my-3">
                            <h3 class="mb-4">${value.name}</h3>
                            <a class="color-red" onclick="deleteCart2(${value.id})" ><i class="fa fa-trash me-3"></i>Xóa sản phẩm</a>
                        </div>
                    </div>
                    <div class="col-md-2 text d-flex align-items-center">
                        <span class="fs-3 fw-500 color-red d-md-block d-none">${formathPrice(value.price)}</span>
                    </div>
                    <div class="col-md-2 col-6 text d-flex align-items-center">
                        <div class="soluong my-4 d-flex">
                            <button onclick="handleClickMinus(${value.id})" class="minus" class="">
                                <i class="fa fa-minus fw-bold"></i>
                            </button>
                            <input type="number" name="soluong" value="${value.quanty}" min="1" class="quantity" />
                            <button onclick="handleClickPlush(${value.id})" class="plus"><i class="fa fa-plus fw-bold"></i></button>
                        </div>
                    </div>
                    <div class="col-md-2 col-6 text d-flex align-items-center">
                        <span class="fs-3 me-3 fw-500 d-md-none d-block">Tổng tiền: </span><span
                            class="fs-3 fw-500 color-red total-product">${formathPrice(totalPrice)}</span>
                    </div>
                </div>
         `
    });
    console.log(html);
    if (html != '') {
        localStorage.removeItem('cart')
        let cartJson = JSON.stringify(data);
        localStorage.setItem('cart', cartJson);
        $('#list-cart-container').html(html);
        $('.total-cart-price').html(formathPrice(totalCartPrice));
        $('.qty-product').html()
    }
    else {
        $('#list-cart-container').html("<div class='text-center text-danger fs-2 fw-bold my-5'>Gio hàng trống</div>");
    }
}

let cartsJson = localStorage.getItem('cart')
let carts = JSON.parse(cartsJson) || [];
console.table(carts);
renderCart(carts);
function deleteCart2(id) {
    let index = carts.findIndex(x => x.id == id);
    localStorage.removeItem('cart')
    if (index != -1) {
       carts.splice(index, 1);
       console.log(carts);
       renderCart(carts);
    }
    
 }
const handleClickPlush = (id) => {
    let index = carts.findIndex(x => x.id == id);
    if (index != -1) {
        if (carts[index].quanty < carts[index].qty) {
            carts[index].quanty++;
            console.log(carts[index].qty);
            renderCart(carts)
            console.table(carts);
        }

    }
}
const handleClickMinus = (id) => {
    let index = carts.findIndex(x => x.id == id);
    if (index != -1) {
        if (carts[index].quanty > 1) {
            carts[index].quanty--;

            renderCart(carts)

        }

    }
}

