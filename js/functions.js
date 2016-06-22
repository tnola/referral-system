function newFormElement(name, type, id, content, small_text){
	var res;
	res = '<fieldset class="form-group"><label for="' + id + '">' + name + '</label>';
	switch(type){
		case 'input':
			res += '<input type="text" id="' + id + '" class="' + id + ' form-control"' + (content ?  ' value="' + content + '"' : '') + ' placeholder="' + name + '">';
			break;
		case 'select':
			res += '<select id="' + id + '" class="' + id + ' form-control">';
			content.forEach(function(item){
				res += '<option value="' + item['val'] + '">' + item['name'] + '</option>';
			});
			res += '</select>';
			break;
		case 'password':
			res += '<input type="password" id="' + id + '" class="' + id + ' form-control"' + (content ?  ' value="' + content + '"' : '') + ' placeholder="' + name + '">';
			break;
	}
	if(small_text){
		res += '<small class="text-muted">' + small_text + '</small>';
	}
	res += '</fieldset>';
	console.log(res);
	return res;
}