function hanldleclick(){
    $('.detail-item').removeClass('details-active')
    $(this).addClass('details-active');
}
 $('.detail-item').click(hanldleclick)



//  TAB LINK
var html=`<p>Được thiết kế từ chất liệu cao su thiên nhiên, cho độ bám sàn tốt cũng như có độ bền cùng độ dẻo dai cao, là chọn lựa lý tưởng của những bạn nam yêu thích thể thao. Đặc biệt, thiết kế chủ đạo màu Chanh phối Đỏ cùng logo ấn tượng, làm toát lên phong cách mạnh mẽ của cầu thủ sân cỏ.</p>
<p>Thân giày đá bóng đế nhựa PVC được làm từ da PU cao cấp, bề mặt bóng chống bám bẩn, chống thấm nước dễ dàng sử dụng trong thời tiết ẩm ướt không lo đến tuổi thọ của giày. Bên cạnh đó, lớp da của phần upper được tráng một lớp firm mỏng giúp bảo vệ phần da giày tốt hơn.</p>
<p>Đế giày đá banh được may toàn bộ quanh mũi giày và gót nên rất chắc chắn, thích ứng với sân cỏ nhân tạo. Giày thiết kế dành riêng cho bề mặt sân cỏ nhân tạo với các khối đinh dăm hình tam giác có độ cao vừa phải, tránh trơn trượt ngay cả khi bạn chạy trên sân cỏ; đồng thời hỗ trợ tuyệt vời cho những pha xử lý bóng bằng gầm giày, những cú ngoặt bóng siêu nhanh.</p>
`
$('.tab-content').html(html);
 $('.tab-link').click(function(e){
    let index= $('.tab-link').index(this)+1

    $('.tab-link').removeClass('active-tab')
    $(this).addClass('active-tab')
    if(index==1){
        let html=``
        $('.tab-content').html(html);
    }
    else if(index==2){
        let html=`<h1>Thương hiệu </h1>`
        $('.tab-content').html(html);
    }
    else{
        let html=`<h1>Đánh giá </h1>`
        $('.tab-content').html(html);
    }
 })


//  so luong product

$('.minus').click(function(){
    let soLuong= Number($(this).siblings('.quantity').val())
    if(soLuong>1){
        soLuong-=1;
        $(this).siblings('.quantity').val(soLuong)
    }
    let tong=price(340000,soLuong)
    $('.total-product').html(formattedPrice(tong))
})
$('.plus').click(function(){
    let soLuong= Number($(this).siblings('.quantity').val())
    soLuong+=1;
    $(this).siblings('.quantity').val(soLuong)
    let tong=price(340000,soLuong)
    $('.total-product').html(formattedPrice(tong))
})
function formattedPrice(format){
    const formattedPrice = format.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
    return formattedPrice
}
function price(priceProduct,quantity){
    return priceProduct*quantity;
}
// next prev silder
$('.slick-next').html('<i class="fa-solid fa-angle-right fs-2 link-hover"></i>')
$('.slick-prev').html('<i class="fa-solid fa-angle-left fs-2 link-hover"></i>')

