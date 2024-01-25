// sort product
function render(data, images) {
    let html = ''
    $.each(data, function (index, item) {
        let filter = images.filter(e => e.product_id == item.id)
        console.log(filter);
        let image = ''
        if (filter.length >= 2) {
            image += `
            <div class='card-hover'>
                <img src="images/products/${filter[0].name}" class="card-img-top card-item" alt="">
                <img src="images/products/${filter[1].name}" class="card-img-top card-item" alt=""></img>
            </div>
           `
        }
        else {
            image += `
            <div class=''>
                <img src="images/products/${item.image}" class="card-img-top card-item" alt="">
            </div>
           `
        }
        html += `
        <div class="col ">
            <div class="card h-100 border border-0">
                <span class="sale">12%</span>
                <a class='position-relative' href="product/${item.slug}">
                ${image}
                    <div class="size fs-6">
                    <span class="size-item">39</span>
                    <span class="size-item">40</span>
                    <span class="size-item">41</span>
                    <span class="size-item">+2</span>
                    </div>
                </a>
    
                <a class='list_product' href="?option=cart&id=" data-product=""><span class="bag"
                    title="Thêm vào giỏ hàng"><i class="fa-solid fa-bag-shopping"></i></span></a>
            <div class="card-body">
                <h5 class="card-title"><a href="product/${item.slug}">${item.name}</a> </h5>
                <p>${item.brand_name}</p>
                <div class="row">
                    <div class="col-md-5">
                        <h5 class="price  text-danger ">
                        ${item.price.toLocaleString()} đ</h5>
                    </div>
                    <div class="col-md-6">
                        <h5 class="text-decoration-line-through text-black-50">
                        ${item.price_sale.toLocaleString()} đ</h5>
                    </div>
                </div>
                <div class="shoer-list">
                
                </div>
            </div>
    
        </div>
    </div>
    
                 `
    });
    if (html != '') {
        $('#list_product').addClass('row-cols-md-4');
        $('#list_product').html(html)
    }
    else {
        $('#list_product').removeClass('row-cols-md-4');
        $('#list_product').html('<div class="mt-5 fs-2 col-12 text-center">Không có sản phẩm nào</div>')
    }
}
// sort
$(document).ready(function () {
    $('.sort').change(function () {
        if ($(this).is(':checked')) {
            let data = $(this).val();
            $('.sort').not(this).prop('checked', false);
            connectAjax('product/sort', data, function (data) {

                render(data[0], data[1])
            })
        } else {
            $(".newdesc").prop("checked", true);
        }
    });
});

// filter
function filter(data, id) {
    let kt = 1;
    for (let i = 0; i < data.length; i++) {
        if (id == data[i]) {
            data.splice(i, 1);
            kt = 0;
        }
    }
    if (kt) {
        data.push(id);
    }
}
$(document).ready(function () {
    let data = [];
    let data2 = [];
    var data3 = {};
    $('.filter').change(function () {
        let name = $(this).attr('name')
        if (name == 'category') {
            filter(data, $(this).val());
        }
        if (name == 'brand') {
            filter(data2, $(this).val());
        }
        if (name == 'price') {
            $('.filter[name="price"]').not(this).prop('checked', false);
            let value = $(this).val();
            let kt = false;
            $.each($('.filter[name="price"]:checked'), function (index, value) {
                kt = true;
                return;
            });
            if (kt) {
                if (value == '1') {
                    data3 = { min: 0, max: 100000 };
                }
                else if (value == '1-3') {
                    data3 = { min: 100000, max: 300000 };
                }
                else if (value == '3-5') {
                    data3 = { min: 300000, max: 500000 };
                }
                else if (value == '5-10') {
                    data3 = { min: 500000, max: 1000000 };
                }
                else if (value == '>10') {
                    data3 = { min: 1000000, max: 150000000 };
                }
            }
            else {
                data3 = { min: 0, max: 150000000 };
            }

        }
        if (data.length > 0 || data2.length > 0 || Object.keys(data3).length > 0) {
            connectAjax('product/filter', { category: data, brand: data2, price: data3 }, function (data) {
                render(data[0], data[1])
                data3 = { min: 0, max: 150000000 };

            })
        }
        else {
            connectAjax('product/sort', 'newdesc', function (data) {
                render(data[0], data[1])
            })
        }

    });
});
