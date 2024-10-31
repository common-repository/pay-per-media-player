function addNewElement()
{
	// mainDiv is a variable to store the object of main area Div.
	var mainDiv = document.getElementById('more_element_area');
	// Create a new div 
	var innerDiv = document.createElement('div');
	// Set the attribute for created new div like here I am assigning Id attribure. 
	innerDiv.setAttribute('id', 'divId' + idno);
	// Create text node to insert in the created Div
	//var generatedContent = '<input type="text" name="new_element' + idno + '"	id="new_element' + idno + '" value="" />: <input type="text" size="70" name="new_element_' + idno + '"	id="new_element_' + idno + '" value="" />&nbsp;<a href="javascript:void(0)" onclick="return removeThisElement(' + idno + ')">Remove This</a>';
	
	var generatedContent = '<input type="text" name="title[]"	id="title' + idno + '" value="" placeholder="title" /><br /><input type="text" name="artist[]"	id="artist' + idno + '" value="" placeholder="artist" /><br /><input type="text" size="70" name="song[]"	id="song' + idno + '" value="" placeholder="media target link" /><br /><input type="text" size="70" name="image[]"	id="image' + idno + '" value="" placeholder="image link" />&nbsp;<a href="javascript:void(0)" onclick="return removeThisElement(' + idno + ')">Remove This</a><br><br><br>';
	
	
	// Inserting content to created Div by innerHtml
	innerDiv.innerHTML = generatedContent;
	// Appending this complete div to main div area.
	mainDiv.appendChild(innerDiv);
	// increment the id number by 1.
	idno++;
}



function addNewElementPreview()
{
	// mainDiv is a variable to store the object of main area Div.
	var mainDiv = document.getElementById('more_element_area');
	// Create a new div 
	var innerDiv = document.createElement('div');
	// Set the attribute for created new div like here I am assigning Id attribure. 
	innerDiv.setAttribute('id', 'divId' + idno);
	// Create text node to insert in the created Div
	//var generatedContent = '<input type="text" name="new_element' + idno + '"	id="new_element' + idno + '" value="" />: <input type="text" size="70" name="new_element_' + idno + '"	id="new_element_' + idno + '" value="" />&nbsp;<a href="javascript:void(0)" onclick="return removeThisElement(' + idno + ')">Remove This</a>';
	
	var generatedContent = '<input type="text" name="title[]"	id="title' + idno + '" value="" placeholder="preview title" /><br /><input type="text" name="artist[]"	id="artist' + idno + '" value="" placeholder="preview artist" /><br /><input type="text" size="70" name="song[]"	id="song' + idno + '" value="" placeholder="preview media link" /><br /><input type="text" size="70" name="image[]"	id="image' + idno + '" value="" placeholder="preview image link" />&nbsp;<a href="javascript:void(0)" onclick="return removeThisElement(' + idno + ')">Remove This</a><br><br><br>';
	
	
	// Inserting content to created Div by innerHtml
	innerDiv.innerHTML = generatedContent;
	// Appending this complete div to main div area.
	mainDiv.appendChild(innerDiv);
	// increment the id number by 1.
	idno++;
}




function addNewElementPayPal()
{
	// mainDiv is a variable to store the object of main area Div.
	var mainDiv = document.getElementById('more_element_area');
	// Create a new div 
	var innerDiv = document.createElement('div');
	// Set the attribute for created new div like here I am assigning Id attribure. 
	innerDiv.setAttribute('id', 'divId' + idno);
	// Create text node to insert in the created Div
	//var generatedContent = '<input type="text" name="new_element' + idno + '"	id="new_element' + idno + '" value="" />: <input type="text" size="70" name="new_element_' + idno + '"	id="new_element_' + idno + '" value="" />&nbsp;<a href="javascript:void(0)" onclick="return removeThisElement(' + idno + ')">Remove This</a>';
	
	var generatedContent = '<input type="text" name="title[]"	id="title' + idno + '" value="" placeholder="item name" /><br /><input type="text" name="artist[]"	id="artist' + idno + '" value="" placeholder="item number" /><br /><input type="text" size="70" name="song[]"	id="song' + idno + '" value="" placeholder="store paypal email" /><br /><input type="text" size="70" name="image[]"	id="image' + idno + '" value="" placeholder="item amount" />&nbsp;<a href="javascript:void(0)" onclick="return removeThisElement(' + idno + ')">Remove This</a><br><br><br>';
	
	
	// Inserting content to created Div by innerHtml
	innerDiv.innerHTML = generatedContent;
	// Appending this complete div to main div area.
	mainDiv.appendChild(innerDiv);
	// increment the id number by 1.
	idno++;
}



function removeThisElement(idnum)
{
	// mainDiv is a variable to store the object of main area Div.
	var mainDiv = document.getElementById('more_element_area');
	// get the div object with get Id to remove from main div area.
	var innerDiv = document.getElementById('divId' + idnum);
	// Removing element from main div area.
	mainDiv.removeChild(innerDiv);
 
}
