
/*let items =  []

if ( ! localStorage.tems ){
    alert("no items in storage")
} else {
    items = JSON.parse( localStorage.items )
    console.log(items)
}*/

//Ternary
//let items = ! localStorage.tems ? [] : JSON.parse( localStorage.items )

/*This is a valid JSON object
let item = {"name":"shoe", "price":10}
//Save this object to localStorage - Dette vil den dog ikke, fordi man ikke kan putte andet end tekst i localStoraage.
//So that why we convert anything to text to put it in localStorage
//JSON.strinify = Makes everything into text for the storage
localStorage.myItem = JSON.stringify(item)
//Read the item and alert the price only - but this will not work since it's just text, 
//so we need to do JSON.parse to get it backto JSON object
let itemFromMemory = JSON.parse(localStorage.myItem) //{"name":"shoe","price":10}
alert( itemFromMemory.price )



Set an item in localStorage
localStorage.setItem("name", "AAA")
or
localStorage.lastName = "DDDD"

Get from local storage
let theName = localStorage.getItem("name")
console.log("TheName", theName)

Delete an item from localStorage
localStorage.removeItem("name")*/



function one(q){ return document.querySelector(q) }
function all(q){ return document.querySelectorAll(q) }
//Ternary
let items = ! localStorage.tems ? [] : JSON.parse( localStorage.items )

//Compoment
let item = {

    save : function(){
     //This is for the DOM
    const itemId = Math.random()
    const itemName = one("#itemName").value
        let divItem = `<div class="item" data-itemId="${itemId}">
                        <div>${itemName}</div>
                        <div onclick="item.delete()">🗑️</div>
                        </div>`
        one("#items").insertAdjacentHTML('afterbegin', divItem)
        one("#itemName").value = ""

    //This is for the memory - Local Story
    let jItem = {"id":Math.random(), "name" : itemName}

    //Push tbe jItem to the items array
    items.push(jItem)

    //Save the items array in the localStorage
    localStorage.items = JSON.stringify( items )
    },

    delete : function(){
        // This is for the DOM
        // alert("deleting item with id: ", item.itemId)
        //alert("delete item with id "+ idFromParentElement)

        event.target.parentNode.remove()
        const idFromParentElement = event.target.parentNode.getAttribute("data-itemId")
        items = items.filter( element => element.id != idFromParentElement)
        localStorage.items = JSON.stringify(items)

        // Option 1: Set the id of the item in the parent
        // Option 2: Pass the id of the item to this function
        // With the id loop/filter the items array
        // If there is a match in the id remove the item  it from the items array
        // Remember that this is only in JS memory
        // Therefore, you must re-write to items array to localStorage (as text)
    }


}


