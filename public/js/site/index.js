$('.btn-mb').click(function () {
   $('.nav').addClass('active')
   $('.nav-1>ul').addClass('active')

})
$('.i-drop').click(function () {
   $('.nav-item-hover1').toggleClass('active-down')
})
$('.close').click(function () {
   $('.nav').removeClass('active')
   $('.nav-1>ul').removeClass('active')
})
$('.search-mb i').click(function () {
   $('.form-search-mb').toggleClass('active')
})

function formathPrice(value){
   return value.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
}

function renderComment(data, post_id) {
   let html = ''
   data.reverse();
   $.each(data, function (index, value) {
      var timestamp = value.created_at;
      var dateTime = new Date(timestamp);
      var formattedDateTime = "Đăng lúc " + dateTime.toLocaleTimeString('vi-VN', { hour: 'numeric', minute: 'numeric' }) + " ngày " + dateTime.getDate() + " tháng " + (dateTime.getMonth() + 1) + " năm " + dateTime.getFullYear();
      html += `
       <div class="comment-user my-4">
         <div class="comment-user-item">
           <div 
           class="user-img">
           <img class=""
               src="https://tse2.explicit.bing.net/th?id=OIP.IZHEgMNoXV8J61xUWl7d8QHaFj&pid=Api&P=0"
               alt="">
               </div>
           <div class="col">
               <h6 class="fs-3 text-capitalize">${value.user_name}</h6>
               <p class="color-secondary fs-5">${formattedDateTime}</p>
               ${value.post_id == post_id ? '<span class="delete_comment text-danger me-4">Delete</span> <span class="edit_comment text-danger">Edit</span>' : ''}
               
               <p class="fs-5 wrap-text my-3">${value.content}</p>
           </div>
       </div>
   </div>
       `

   });
   if (html == '') {
      $('#comment_show').html('<div class="text-center fs-3 ">Chưa có bình luận</div>');
   }
   else {

      $('#comment_show').html(html);
   }
}
function commentShow() {
   let post_id = $('#post_id').val();
   connectAjax('post/commentShow', post_id, function (data) {
      renderComment(data, post_id);
   })
}
commentShow();
$(document).ready(function () {
   $('#comment').submit(function (e) {
      e.preventDefault();
      let post_id = $('#post_id').val();
      let content = $('#comment_content').val();
      let data = { post_id, content }
      if (post_id != '', data != '') {
         connectAjax('post/comment', data, function (data) {
            $('#comment_content').val('');
            commentShow();
         })
      }
   });
});

// add to cart
let cartLocal = localStorage.getItem('cart');
let cart = JSON.parse(cartLocal) || [];

function deleteCart(id) {
   let index = cart.findIndex(x => x.id == id);
   localStorage.removeItem('cart')
   if (index != -1) {
      cart.splice(index, 1);
      cartRender(cart);
   }
   let cartJson = JSON.stringify(cart);
   localStorage.setItem('cart', cartJson);
}
function cartRender(data) {
   let html = ''
   let totalCart = 0
   let price = 0
   let totalQty = 0
   $.each(data, function (index, value) {
      totalCart += value.price
      totalQty += value.quanty
      price = value.price.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
      html += `
       <div class="cart-item d-flex p-3">
         <div class="cart-img ">
            <a href="?option=product&slug=ádadada"> 
               <img class="w-100" src="images/products/${value.image}" alt="">
            </a>
         </div>
         <div class="cart-content w-100 ms-3">
               <div class="cart-name  mb-4">
                  <h4><a class="text-dark" href="?option=product&slug=1">
                  ${value.name}
                     </a></h4>
               </div>
               <div class="cart-price text-success fs-5 my-2"><span
                     class='px-3 py-1 border'>
                     ${value.quanty}
                  </span></div>
               <div class="cart-price text-success fs-5">
                  ${price}
               </div>
         </div>
         <span class='text-success fs-4 text-danger p-3'>
         <span onclick="deleteCart(${value.id})" data-id="${value.id}" class="text-success deleteCart" > <i
                     class="fa-solid fa-trash-can"></i></span></span>
      </div>
       `
   });
   if (html == '') {
      $('.cart-container').addClass('d-none');
      $('.cart-none').removeClass('d-none');
      $('.account-icon').addClass('cart-hide')

   }
   else {
      $('.cart-container').removeClass('d-none');
      $('.account-icon').removeClass('cart-hide')
      $('.account-icon').attr('data-count',totalQty);
      $('.cart-none').addClass('d-none');
   }
   $('#cart-top').html(html);
   $('.total_price_cart').html(totalCart.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' }));


}
cartRender(cart);

$('.addToCart').click(function () {
   let id = $(this).attr('data-id');
   connectAjax('/addToCart', id, function (data) {
      let index = cart.findIndex(x => x.id == data.id);
      if (index != -1) {
         cart[index].quanty++;
      }
      else {
         let dataCoppy = { ...data, quanty: 1 }
         cart.unshift(dataCoppy);
      }
      console.log(cart);
      cartRender(cart);
      let cartJson = JSON.stringify(cart);
      localStorage.setItem('cart', cartJson);
   })
})