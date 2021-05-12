;(function () {
    const sec = document.querySelector(".second-hand");
    const min = document.querySelector(".min-hand");
    const hour = document.querySelector(".hour-hand");

    function timeHandler() {
        setClock()
        setTimeout(timeHandler, 1000);
    }

    function animeHandler() {
        setClock()
        window.requestAnimationFrame(animeHandler, 1000)

    }

    function setClock() {
        let currentTime = new Date();

        let secDeg = currentTime.getSeconds() * 6;
        let minDeg = currentTime.getMinutes() * 6 + currentTime.getSeconds() * 6 / 60;
        let hourDeg = currentTime.getHours() * 30 + currentTime.getMinutes() * 30 / 60;

        sec.style.transform = `rotate(${secDeg}deg)`;
        min.style.transform = `rotate(${minDeg}deg)`;
        hour.style.transform = `rotate(${hourDeg}deg)`;

    }

    window.requestAnimationFrame(animeHandler, 1000)
    

})()

;(function(){
  //DOM
const list = document.querySelector(".list");
const inputTxt = document.querySelector(".txt");
const saveBtn = document.querySelector(".saveBtn");
let data =[];

renderData()
function renderData(){
  let str="";
  data.forEach(function(item,index){
  str+=` <li>${item.content}  <input type="button" data-id="${index}" class="btn delete" value="刪除" > </li>`;
})
  list.innerHTML = str;
  inputTxt.value= "";
}

//【新增】
saveBtn.addEventListener("click",function(e){
  if (inputTxt.value==""){
    alert("請輸入今天要完成的事唷~");
    return;
  }
  let obj ={};
  obj.content= inputTxt.value;
  data.push(obj);
  renderData()
})

//【刪除】
list.addEventListener("click",function(e){ 
  if (e.target.getAttribute("class") !== "btn delete"){
    return;
};

if (confirm("確定要刪除此筆待辦嗎?")) {
   let deleteNum = e.target.getAttribute("data-id");
   data.splice(deleteNum,1);
   renderData()
}
else {
    return;
}

 
 
})
})()
