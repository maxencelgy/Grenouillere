const slot = document.querySelectorAll('.slot')
const submit = document.querySelector(".send")
const response = document.querySelector("#response")
const child = document.querySelectorAll(".childs")
console.log(child.length);
// console.log(slot);
// console.log(submit);
console.log(response);

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
    console.log(send);
    let i = 0
    e.preventDefault()
    response.innerHTML = '';
    send.forEach(e => {
        console.log(e);
        // listes des enfants
        child.forEach(e => {
            response.innerHTML += `
            <input type="checkbox" name="id_child_${i}[]" value="${e.id}">
            <label for="child${e.id}_${i}">${e.textContent}</label>
            `;
        })
        response.innerHTML += `
        <br>
        <input type="text" name="date_slot_${i}" value="${e.children[0].textContent}">       
        <input type="text" name="fk_planning_${i}" value="${e.children[1].textContent}">        
        <input type="text" name="id_slot_${i}" value="${e.children[2].textContent}">    
        <input type="text" name="id_user_${i}" value="${e.children[3].textContent}">    
        `
        
        response.innerHTML += `<br>`;
        i++;
    })
    });

});