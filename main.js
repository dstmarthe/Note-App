var $ = require("jquery");
var SimpleLightbox = require("simple-lightbox");
SimpleLightbox.registerAsJqueryPlugin($);
//Global selectors
const lInput = document.querySelector("#nField");
const lTitle = document.querySelector("#nTitle");
const lSubmit = document.querySelector(".leaf-submit");
const stem = document.querySelector("#leaves");
const leafContent = document.querySelectorAll(".leafCont");
const signupLink = document.querySelector("#signupLink");
signupLink.preventDefault();
//Event Listeners
lSubmit.addEventListener("click", addNote);
stem.addEventListener("click", deleteNote);

//Listener Functions
function addNote(e) {
	e.preventDefault();
	const noteDiv = document.createElement("div");
	noteDiv.classList.add("leaf");

	const newNote = document.createElement("p");

	newNote.innerText = `${lTitle.value}
    ${lInput.value}
    `;
	newNote.classList.add("leafCont");
	noteDiv.appendChild(newNote);

	const deleteLeaf = document.createElement("button");
	deleteLeaf.innerHTML = "<i class= 'fa fa-trash'></i>";
	deleteLeaf.classList.add("deleteL");
	newNote.appendChild(deleteLeaf);

	//Append to list
	stem.appendChild(noteDiv);
	lInput.value = "";
	lTitle.value = "";
	document
		.querySelectorAll(".leafCont")
		.forEach((link) => link.addEventListener("click", extendNote));
}

function deleteNote(e) {
	const note = e.target;
	if (note.classList[0] === "deleteL") {
		const thisNote = note.parentElement;
		thisNote.remove();
	}
}
function extendNote(e) {
	const thisnote = e.target;
	thisnote.classList.toggle("extendLeaf");
}
//happens automatically if the user is logged in
function autoNote(title, note) {
	const noteDiv = document.createElement("div");
	noteDiv.classList.add("leaf");

	const newNote = document.createElement("p");

	newNote.innerText = `${title}
${note}
`;
	newNote.classList.add("leafCont");
	noteDiv.appendChild(newNote);

	const deleteLeaf = document.createElement("button");
	deleteLeaf.innerHTML = "<i class= 'fa fa-trash'></i>";
	deleteLeaf.classList.add("deleteL");
	newNote.appendChild(deleteLeaf);

	//Append to list
	stem.appendChild(noteDiv);
	lInput.value = "";
	lTitle.value = "";
	document
		.querySelectorAll(".leafCont")
		.forEach((link) => link.addEventListener("click", extendNote));
}
$("#signupLink").simpleLightbox();
SimpleLightbox.open({
	content:
		'<h1 id="title">Sign up</h1><p id="description">Signing up allows you to save notes!</p><form method="post" id="survey-form"><label for="name" id="name-label" class="box">Username:<br><br><br><input type="text" id="usern" name="name" placeholder="Enter a username" required></label><label for="email" id="email-label" class="box"  >Email:<br><br><br><input type="email" id="email" name="email" placeholder="Enter your e-mail address" required></label><label for="pass" class="box" >Email:<br><br><br><input type="password" id="email" name="pass" required placeholder="Enter a password"></label><button type="submit" id="submit">Submit</button></form>',
	elementClass: "slb",
});
