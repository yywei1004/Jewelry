// 單品數量
let inputItems = document.querySelector(".order-input");
console.log(inputItems);
// 按鈕-
let reduceBtns = document.querySelector(".order-reduce");
// 按鈕+
let addBtns = document.querySelector(".order-plus");
//庫存
let storageQty = document.querySelector(".product-remaincount");

// 按鈕-
reduceBtns.addEventListener('click',function(){
    inputItems.value = parseInt(inputItems.value) -1 ;
    if(inputItems.value <= 0){
        inputItems.value = 1;
    }
});    

// 按鈕+
addBtns.addEventListener('click',function(){
    inputItems.value = parseInt(inputItems.value) +1 ;
    storage();
});    


// 在輸入框內輸入數字
inputItems.addEventListener('change' , function(){
    // 防呆功能  不會有輸入0還能計算
    if (inputItems.value <= 0){
        inputItems.value = 1;
    }
    storage();
});   

//最多選擇數量=庫存
function storage(){
    if(inputItems.value >= storageQty.innerHTML){
        inputItems.value = storageQty.innerHTML;    
    }
}
