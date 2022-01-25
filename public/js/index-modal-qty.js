// 單品數量
let inputItems = document.querySelectorAll(".order-input");
// 按鈕-
let reduceBtns = document.querySelectorAll(".order-reduce");
// 按鈕+
let addBtns = document.querySelectorAll(".order-plus");
//庫存
let storageQty = document.querySelectorAll(".product-remaincount");

// 按鈕-
reduceBtns.forEach(function(reduceBtn){
    reduceBtn.addEventListener('click',function(){
        inputItems.forEach(function(inputItem){
            inputItem.value = parseInt(inputItem.value) -1 ;
            if(inputItem.value <= 0){
                inputItem.value = 1;
            }
            storage();
        })
    });   
})


// 按鈕+
addBtns.forEach(function (addBtn) {
    addBtn.addEventListener('click',function(){
        inputItems.forEach(function(inputItem){
            inputItem.value = parseInt(inputItem.value) +1 ;
        storage();
        })
    });
})



// 在輸入框內輸入數字
inputItems.forEach(function(inputItem){
    inputItem.addEventListener('change' , function(){
        // 防呆功能  不會有輸入0還能計算
        if (inputItem.value <= 0){
            inputItem.value = 1;
        }
        storage();
    });
})


//最多選擇數量=庫存
function storage(){
    for (let i = 0; i < storageQty.length; i++) {
        if(parseInt(inputItems[i].value) >= storageQty[i].innerHTML){
            inputItems[i].value = parseInt(storageQty[i].innerHTML);    
        }
    }
}
