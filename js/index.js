////////////////////////////////////////////////////
//				Global arrays
////////////////////////////////////////////////////
var inputRadioArray = document.querySelectorAll('input[type="radio"]');
var fieldsetArray = document.querySelectorAll("fieldset");

////////////////////////////////////////////////////
//				Main navigation tabs
////////////////////////////////////////////////////
var tabUploadFiles = document.getElementById("tab-rawfile");
var tabSelectFiles = document.getElementById("tab-selectfile");
var tabParameters = document.getElementById("tab-parameter");

var uploadFileSec = document.getElementById("fileupload-wrapper");
var selectFileSec = document.getElementById("fileselect-wrapper");
var parameterSec = document.getElementById("parameter-wrapper");

var sessionSubmitBtn = document.getElementById("session-submit-label-wrapper");
var uploadSubmitBtn = document.getElementById("fileupload-submit-label-wrapper");

if(tabUploadFiles){
	tabUploadFiles.addEventListener("click", function(){
		tabUploadFiles.setAttribute("class", "active");
		tabSelectFiles.removeAttribute("class", "active");
		tabParameters.removeAttribute("class", "active");
		uploadFileSec.style.display="block";
		selectFileSec.style.display="none";
		parameterSec.style.display="none";
		sessionSubmitBtn.style.display="none";
		uploadSubmitBtn.style.display="block";
	});
}

if(tabSelectFiles){
	tabSelectFiles.addEventListener("click", function(){
		tabUploadFiles.removeAttribute("class", "active");
		tabSelectFiles.setAttribute("class", "active");
		tabParameters.removeAttribute("class", "active");
		uploadFileSec.style.display="none";
		selectFileSec.style.display="block";
		parameterSec.style.display="none";
		sessionSubmitBtn.style.display="block";
		uploadSubmitBtn.style.display="none";
	});
}

if(tabParameters){
	tabParameters.addEventListener("click", function(){
		tabUploadFiles.removeAttribute("class", "active");
		tabSelectFiles.removeAttribute("class", "active");
		tabParameters.setAttribute("class", "active");
		uploadFileSec.style.display="none";
		selectFileSec.style.display="none";
		parameterSec.style.display="block";
		sessionSubmitBtn.style.display="block";
		uploadSubmitBtn.style.display="none";
	});
}

////////////////////////////////////////////////////
//				Raw files
////////////////////////////////////////////////////
var generateUploadBtn = document.getElementById("generateUploadBtn");
var showRawFileListBtn = document.getElementById("open-select-rawfile-label");
var submitSelectedRawfiles = document.getElementById("selectedRawFileListSubmitLable");

if(generateUploadBtn){
	generateUploadBtn.addEventListener("click", function(){
		var newInput = document.createElement("input");
		var newDiv = document.createElement("div");
		newInput.setAttribute("type", "file");
		newInput.setAttribute("name", "RawFileToUpload[]");
		newInput.setAttribute("style", "margin:10px");
		newDiv.appendChild(newInput);
		document.getElementById("raw-files-upload").insertBefore(newDiv, document.getElementById("generateUploadBtn"));
	});
}

if(showRawFileListBtn){
	showRawFileListBtn.addEventListener("click", function(){
		//alert("open");
		document.getElementById("select-rawfile-wrapper").setAttribute("style", "display:block");
	});
}

var rawFileList = document.querySelectorAll("input.raw-file-list");
var selectedRawFiles = [];
console.log(rawFileList);
console.log(selectedRawFiles);
for(var i = 0; i < rawFileList.length; i++){
	rawFileList[i].addEventListener("change", checkBoxStats(i), false);
}

function checkBoxStats(num){
	return function(){
		if(rawFileList[num].checked){
			selectedRawFiles.push(rawFileList[num].value);
		}else if(!rawFileList[num].checked){
			console.log("gonna remove" + rawFileList[num].value);
			removeRawFile(num);
		}
		console.log(selectedRawFiles);
	}
}

function removeRawFile(index){
	for(var n = 0; n<selectedRawFiles.length; n++){
		if(selectedRawFiles[n] == rawFileList[index].value){
			selectedRawFiles.splice(n, 1);
		}
	}
}
if(submitSelectedRawfiles){
	submitSelectedRawfiles.addEventListener("click", function(){
	console.log(selectedRawFiles);
	document.getElementById("select-rawfile-wrapper").setAttribute("style", "display:none");
	var divRawList = document.getElementById("selected-rawfile-list-wrapper");
	var ulRawList = document.createElement("ul");

	for (var j = 0; j< selectedRawFiles.length; j++){
		var liRawList = document.createElement("li");
		var input = document.createElement("input");
		input.setAttribute("type", "hidden");
		input.setAttribute("name", "selectedRawFileList[]");
		input.setAttribute("value", selectedRawFiles[j]);
		var txtInput = document.createElement("input");
		txtInput.setAttribute("type", "text");
		txtInput.setAttribute("name", "experiments");
		var text = document.createTextNode(selectedRawFiles[j]);
		liRawList.appendChild(txtInput);
		liRawList.appendChild(text); 
		liRawList.appendChild(input);

		ulRawList.appendChild(liRawList);
	}
	//divRawList.innerHTML="";
	divRawList.appendChild(ulRawList);
})
}



////////////////////////////////////////////////////
//				Isotope label tabs
////////////////////////////////////////////////////
var tabLight = document.getElementById("tab-light");
var tabMedium = document.getElementById("tab-medium");
var tabHeavy = document.getElementById("tab-heavy");
var lightIsotopeList = document.getElementById("isotope-section-light");
var mediumIsotopeList = document.getElementById("isotope-section-medium");
var heavyIsotopeList = document.getElementById("isotope-section-heavy");

if(tabLight){
	tabLight.addEventListener("click", function(){
	//alert("show table one");
	tabLight.setAttribute("class", "active");
	tabMedium.removeAttribute("class", "active");
	tabHeavy.removeAttribute("class", "active");
	lightIsotopeList.style.display="block";
	mediumIsotopeList.style.display="none";
	heavyIsotopeList.style.display="none";
});	
}

if(tabMedium){
	tabMedium.addEventListener("click", function(){
	//alert("show table two");
	tabLight.removeAttribute("class", "active");
	tabMedium.setAttribute("class", "active");
	tabHeavy.removeAttribute("class", "active");
	lightIsotopeList.style.display="none";
	mediumIsotopeList.style.display="block";
	heavyIsotopeList.style.display="none";
});
}

if(tabHeavy){
	tabHeavy.addEventListener("click", function(){
	//alert("show table two");
	tabLight.removeAttribute("class", "active");
	tabMedium.removeAttribute("class", "active");
	tabHeavy.setAttribute("class", "active");
	lightIsotopeList.style.display="none";
	mediumIsotopeList.style.display="none";
	heavyIsotopeList.style.display="block";
});
}


////////////////////////////////////////////////////
//				Upload files
////////////////////////////////////////////////////

/**************Select Database************/
// var dfDatabaseRad = document.getElementById("dfDatabase");
// var cusDatabaseRad = document.getElementById("cusDatabase");

// dfDatabaseRad.addEventListener("click", function(){
// 	//alert("clicked df");
// 	console.log(dfDatabaseRad.hasAttribute("checked"));
// 	if(dfDatabaseRad.hasAttribute("checked") == false){
// 		dfDatabaseRad.setAttribute("checked", "checked");
// 		cusDatabaseRad.removeAttribute("checked", "checked");
// 		obtainFiledsets(fieldsetArray, "custome-database-upload").setAttribute("disabled", "disabled");
// 		obtainFiledsets(fieldsetArray, "default-databse-options").removeAttribute("disabled", "disabled");
// 		document.getElementById("show-selected-default-database").removeAttribute("class", "grayout");
// 	}
// 	console.log(dfDatabaseRad.hasAttribute("checked"));
// });

// cusDatabaseRad.addEventListener("click", function(){
// 	//alert("clicked cus");
// 	console.log(cusDatabaseRad.hasAttribute("checked"));
// 	if(cusDatabaseRad.hasAttribute("checked") == false){
// 		cusDatabaseRad.setAttribute("checked", "checked");
// 		dfDatabaseRad.removeAttribute("checked", "checked");
// 		obtainFiledsets(fieldsetArray, "custome-database-upload").removeAttribute("disabled", "disabled");
// 		obtainFiledsets(fieldsetArray, "default-databse-options").setAttribute("disabled", "disabled");
// 		document.getElementById("show-selected-default-database").setAttribute("class", "grayout");
// 	}
// 	console.log(cusDatabaseRad.hasAttribute("checked"));
// });


/**************Choose raw files************/
// var existingRawFileRad = document.getElementById("existing-raw-files");
// var addRawFileRad = document.getElementById("new-raw-files");

// existingRawFileRad.addEventListener("click", function(){
// 	console.log(existingRawFileRad.hasAttribute("checked"));
// 	if(existingRawFileRad.hasAttribute("checked") == false){
// 		existingRawFileRad.setAttribute("checked", "checked");
// 		addRawFileRad.removeAttribute("checked", "checked");
// 		obtainFiledsets(fieldsetArray, "choose-existing-rawfiles").removeAttribute("disabled", "disabled");
// 		obtainFiledsets(fieldsetArray, "raw-files-upload").setAttribute("disabled", "disabled");
// 	}
// 	console.log(existingRawFileRad.hasAttribute("checked"));
// });

// addRawFileRad.addEventListener("click", function(){
// 	console.log(addRawFileRad.hasAttribute("checked"));
// 	if(addRawFileRad.hasAttribute("checked") == false){
// 		existingRawFileRad.removeAttribute("checked", "checked");
// 		addRawFileRad.setAttribute("checked", "checked");
// 		obtainFiledsets(fieldsetArray, "choose-existing-rawfiles").setAttribute("disabled", "disabled");
// 		obtainFiledsets(fieldsetArray, "raw-files-upload").removeAttribute("disabled", "disabled");
// 	}
// 	console.log(addRawFileRad.hasAttribute("checked"));
// });



/**************custom functions************/
//loop through fieldsets and return the one with correct "id"
function obtainFiledsets(array, id){
	//console.log(array);
	for (var i = 0; i < array.length; i++){
		if(array[i].getAttribute("id") == id){
			console.log("found: "+ id);
			return array[i];
		}
		else{
			//for testing uses
			//console.log("nothing found at " + i);
		}
	}
}
