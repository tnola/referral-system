/* this was created for easy form creation */
function newFormElement(name, type, id, content, small_text){
	var res;
	res = '<div class="form-group row"><label for="' + id + '" class="col-sm-3 form-control-label">' + name + '</label><div class="col-sm-9">';
	switch(type){
		case 'text':
		case 'email':
			res += '<input type="' + type + '" id="' + id + '" name="' + id + '" class="' + id + ' form-control"' + (typeof content != 'undefined' ?  ' value="' + content + '"' : '') + ' placeholder="' + name + '">';
			break;
		case 'select':
		case 'multiselect':
			res += '<select id="' + id + '" name="' + id + '" class="' + id + ' form-control"' + (type == 'multiselect' ? ' multiple' : '') + '>';
			if(type == 'select'){
				res += '<option disabled selected>Select Your ' + name + '</option>';
			}
			content.forEach(function(item){
				res += '<option value="' + item['val'] + '">' + item['name'] + '</option>';
			});
			res += '</select>';
			break;
		case 'password':
			res += '<input type="password" id="' + id + '" name="' + id + '" class="' + id + ' form-control"' + (typeof content != 'undefined' ?  ' value="' + content + '"' : '') + ' placeholder="' + name + '">';
			break;
		case 'textarea':
			res += '<textarea id="' + id + '" name="' + id + '" class="' + id + ' form-control" rows="' + content['rows'] + '">' + content['val'] + '</textarea>';
			break;
		case 'radio':
			var i = 1;
			content.forEach(function(item){
				res += '<div class="radio' + (item['disabled'] == 'disabled' ? ' disabled' : '') + '"><label>';
				res += '<input type="radio" name="' + id + '" class="' + id + '" id="' + id + i + '" value="' + item['val'] + '"' + (item['checked'] == 'checked' ? ' checked' : '') + '>';
				res += item['name'] + '</label></div>'; 
				i++;
			});
			break;
		case 'checkbox':
			content.forEach(function(item){
				res += '<div class="checkbox ' + (item['disabled'] == 'disabled' ? ' disabled' : '') + '"><label>';
				res += '<input type="checkbox" name="' + id + '" id="' + id + '" value="' + item['val'] + '"> ' + item['name'] + '</label></div>'
			});
			break;
	}
	if(small_text){
		res += '<small class="text-muted">' + small_text + '</small>';
	}
	res += '</div></div>';
	console.log(res);
	return res;
}