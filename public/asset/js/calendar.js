const slot = document.querySelectorAll('.slot')
const submit = document.querySelector("#send")
const response = document.querySelector("#response")

let send = []
slot.forEach((e) => {
    e.addEventListener("click", function (e) {
    e.preventDefault();
    this.classList.toggle("clicked");
    if(this.classList[1] ==='clicked'){
        send.push(this) 
    }else{
        let index = send.indexOf(this)
        send.splice(index, 1);
    }
    let i = 0
    e.preventDefault()
    send.forEach(e => {
        response.innerHTML += `
        <input style="display : none" type="text" name="date_slot_${i}" value="${e.children[0].textContent}">
        <input style="display : none" type="text" name="fk_planning_${i}" value="${e.children[1].textContent}">
        `
        i++;
    })
    });

});