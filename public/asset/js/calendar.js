const slot = document.querySelectorAll('.slot')

const submit = document.querySelector("#send")
const response = document.querySelector("#response")


console.log(response);
let send = []
slot.forEach((e) => {
    e.addEventListener("click", function (e) {
    e.preventDefault();
    this.classList.toggle("clicked");
    // console.log(this.classList);
    if(this.classList[1] ==='clicked'){
        send.push(this) 
    }else{
        let index = send.indexOf(this)
        send.splice(index, 1);
    }
    console.log(send);

    });

});
submit.addEventListener("click", function (e) {
    let i = 0
    e.preventDefault()
    response.innerHTML += `
    <input type="text" name="fk_company" value="6">
    <input type="text" name="child_remaining_slot" value="4">
    `
    send.forEach(e => {

        response.innerHTML += `
        <input type="text" name="date_slot_${i}" value="${e.children[0].textContent}">
        <input type="text" name="fk_planning_${i}" value="${e.children[1].textContent}">
        `        
        console.log(e.children[0].textContent);
        console.log(e.children[1].textContent);
        i++;
    })
    response.innerHTML += `<input type="submit" value="Valider">`;
})
