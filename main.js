//Global selectors
const lInput = document.querySelector("#nField");
const lSubmit = document.querySelector(".leaf-submit");
const stem = document.querySelector("#leaves");

//Event Listeners
lSubmit.addEventListener("click", addNote);
stem.addEventListener("click", deleteNote)

//Listener Functions
function addNote(e) {
    e.preventDefault();
    const noteDiv = document.createElement("div");
    noteDiv.classList.add("leaf")
    
    const newNote = document.createElement("p")
    newNote.innerText = lInput.value
    newNote.classList.add("leafCont")

    noteDiv.appendChild(newNote)

    const deleteLeaf = document.createElement("button");
    deleteLeaf.innerHTML = "<i class= 'fa fa-trash'></i>";
    deleteLeaf.classList.add("deleteL");
    newNote.appendChild(deleteLeaf);

    //Append to list
    stem.appendChild(noteDiv);
    lInput.value = "";

}

function deleteNote(e) {
 const note = e.target;
 if (note.classList[0] === "deleteL") {
     const thisNote = note.parentElement;
     thisNote.remove();
 }
}