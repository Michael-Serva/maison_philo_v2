function wishList() {
    var list = document.getElementById("toast");
    list.classList.add("show");
    list.innerHTML = '<i class="far fa-heart wish"></i> Product added to List';
    setTimeout(function () {
        list.classList.remove("show");
    }, 3000);
}

function addCart() {
    var cart = document.getElementById("toast-cart");
    cart.classList.add("show");
    cart.innerHTML = '<i class="fas fa-shopping-cart cart"></i> Product added to cart';
    setTimeout(function () {
        cart.classList.remove("show");
    }, 3000);
}

$("input.variation").on("click", function () {
    if ($(this).val() > 3) {
        $("body").css("background", "#111");
        $("footer").attr("class", "dark");
    } else {
        $("body").css("background", "#f9f9f9");
        $("footer").attr("class", "");
    }
});

// toggle list vs card view
$(".option__button").on("click", function () {
    $(".option__button").removeClass("selected");
    $(this).addClass("selected");
    if ($(this).hasClass("option--grid")) {
        $(".results-section").attr("class", "results-section results--grid");
    } else if ($(this).hasClass("option--list")) {
        $(".results-section").attr("class", "results-section results--list");
    }
});
