// Row counter to keep track of added rows and columns

var rowCounter = 1;

var colCounter = 1;

var initialRow = 0;

var initialCol = 0;



// Row template to be inserted, notice the {0} that is a place holder replaced by the string formatting

var rowTemplate = 	'<li class="row">'+

					'<div class="control-group"><label class="control-label" for="rowName{0}">Name:</label><div class="controls">'+

					'<input type="text" id="rowName{0}" name="RowsTemplate[{0}][name]" class="form-control" /></div></div>'+

					'<div class="control-group"><label class="control-label" for="rowOrder{0}">Order:</label><div class="controls">'+

					'<input type="text" id="rowOrder{0}" name="RowsTemplate[{0}][order]" class="form-control" /></div></div>'+

					'<button type="button" id="remove" class="remove btn btn-danger">Remove</button><br><br>'+

					'</li>';

					

// Column template to be inserted, notice the {0} that is a place holder replaced by the string formatting

var colTemplate = 	'<li class="col">'+

					'<div class="control-group"><label class="control-label" for="colName{0}">Name:</label><div class="controls">'+

					'<input type="text" id="colName{0}" name="ColumnsTemplate[{0}][name]" class="form-control" /></div></div>'+

					'<div class="control-group"><label class="control-label" for="colOrder{0}">Order:</label><div class="controls">'+
	
					'<input type="text" id="colOrder{0}" name="ColumnsTemplate[{0}][order]" class="form-control" /></div></div>'+

					'<button type="button" id="remove" class="remove btn btn-danger">Remove</button><br><br>'+

					'</li>';

					

// Row template to be inserted when adding while editing, notice the {0} that is a place holder replaced by the string formatting

var rowTemplateEdit = 	'<li class="row">'+

						'<div class="control-group"><label class="control-label" for="rowName{0}">Name:</label><div class="controls">'+

						'<input type="text" id="rowName{0}" name="RowsTemplate[{0}][name]" class="form-control"/></div></div>'+

						'<div class="control-group"><label class="control-label" for="rowOrder{0}">Order:</label><div class="controls">'+

						'<input type="text" id="rowOrder{0}" name="RowsTemplate[{0}][order]" class="form-control" /></div></div>'+

						'<input type="hidden" id="rowId{0}" name="RowsTemplate[{0}][id]" value="-1"/>'+

						'<button type="button" id="remove" class="remove btn btn-danger">Remove</button><br>'+

						'</li>';						

// Column template to be inserted when adding while editing, notice the {0} that is a place holder replaced by the string formatting

var colTemplateEdit = 	'<li class="col">'+

						'<div class="control-group"><label class="control-label" for="colName{0}">Name:</label><div class="controls">'+

						'<input type="text" id="colName{0}" name="ColumnsTemplate[{0}][name]" class="form-control" /></div></div>'+

						'<div class="control-group"><label class="control-label" for="colOrder{0}">Order:</label><div class="controls">'+

						'<input type="text" id="colOrder{0}" name="ColumnsTemplate[{0}][order]"  class="form-control" /></div></div>'+

						'<input type="hidden" id="colId{0}" name="ColumnsTemplate[{0}][id]" value="-1"/>'+

						'<button type="button" id="remove" class="remove btn btn-danger">Remove</button><br>'+

						'</li>';

					

// Called when the document object model (DOM) of the page is ready with all elements in place				

jQuery(document).ready(function($) {

	// Bind the click event of the element with the id "addrow" to the function addrow

	$("#addrow").click(addrow);

	// Bind the click event of the element with the id "addcol" to the function addcol

	$("#addcol").click(addcol);

	

	// Bind the click event of the element with the id "addrowEdit" to the function addrowEdit

	$("#addrowEdit").click(addrowEdit);

	

	// Bind the click event of the element with the id "addcolEdit" to the function addcolEdit

	$("#addcolEdit").click(addcolEdit);

	

	// Bind the click event of any element, currently in the DOM or that may appear in

	// the future with the class "remove" to the function remove

	// $(".remove").live('click', remove);
	$('body').on('click', '.remove', remove);

	

	// Bind the click event of any element, currently in the DOM or that may appear in

	// the future with the class "delete" to the function delete

	// $(".delete").live('click', deleteRestore);
	$('body').on('click', '.delete', deleteRestore);


});





function addrow() {

	// Instantiates an instance of the row template, formatting it with the current row number

	var row = rowTemplate.format(rowCounter);

	

	// Append the new row to the element with id "rows"

	$("#rows").append(row);

	

	// Increment the row counter

	rowCounter++;

}



function addcol() {

	// Instantiates an instance of the col template, formatting it with the current col number

	var col = colTemplate.format(colCounter);

	

	// Append the new col to the element with id "cols"

	$("#cols").append(col);

	

	// Increment the col counter

	colCounter++;

}



function addrowEdit() {

	// set the initial row counter to the rows read from the DB

	if(initialRow == 0) {

		rowCounter = $("#initialRowCounter").val();

		initialRow = 1;

	}



	// Instantiates an instance of the row template, formatting it with the current row number

	var row = rowTemplateEdit.format(rowCounter);

	

	// Append the new row to the element with id "rows"

	$("#rows").append(row);

	

	// Increment the row counter

	rowCounter++;

}



function addcolEdit() {

	// set the initial row counter to the rows read from the DB

	if(initialCol == 0) {

		colCounter = $("#initialColumnCounter").val();

		initialCol = 1;

	}



	// Instantiates an instance of the col template, formatting it with the current col number

	var col = colTemplateEdit.format(colCounter);

	

	// Append the new col to the element with id "cols"

	$("#cols").append(col);

	

	// Increment the col counter

	colCounter++;

}



function remove() {

	// $(this) is the button that was clicked

	// Get its parent (the <li>), and remove it from the DOM

	$(this).parent().remove();

}



function deleteRestore() {

	// $(this) is the button that was clicked

	var value = $(this).parent().children(".deleteField").val();

	

	// if it's not deleted, mark it as deleted

	// by changing the value to 1, mark the li

	// with a diff color and changing the button

	// text to Restore

	if(value == "0") {

		// set value to 1

		$(this).parent().children(".deleteField").val("1");

		

		// change background color

		$(this).parent().css("background-color", "rgb(213 207 207)");
		$(this).parent().css("padding", "15px");
		

		// change button text

		$(this).text("Restore");

	}

	

	// if it's deleted, restore it to normal by

	// setting the value to 0, changing the color

	// back to normal and setting the text to Delete

	if(value == "1") {

		// set value to 0

		$(this).parent().children(".deleteField").val("0");

		

		// change background color

		$(this).parent().css("background-color", "rgb(249 249 249)");

		

		// change button text

		$(this).text("Delete");

	}

}



// Method to format strings

// Usage: 'This is a string of {0} and {1}'.format('apples','oranges');

// Outputs: 'This is a string of apples and oranges'

String.prototype.format = function() {

    var txt = this,

        i = arguments.length;



    while (i--) {

        txt = txt.replace(new RegExp('\\{' + i + '\\}', 'gm'), arguments[i]);

    }

    return txt;

};