const target_field = "acfb_meta_select_field"; // select box
const field = acf.getField(target_field);
acf.addAction(`new_field/name=${target_field}`, (field) => {
  const el = field.$el.find("select");
  const { key } = field.data;
  const defaultValue = window[key];
  const available_fields = acf.getFields();



  el.append(`<option value='Null'>Select Field</option>`);


  available_fields.forEach((available_field, index) => {
    const field_name = available_field.data.name;
    const type = available_field.data.type;
    const label = available_field.$el.find("label").html();
    const json_value = {
      name: field_name,
      type,
    };
	  
    const value = JSON.stringify(json_value);
    const isMetaField =
        available_field.$el.parents(".is-normal,.is-side,.is-above").length > 0;
    const isSelected = defaultValue === value ? 'selected' : '';


    const option = `<option ${isSelected} value='${value}'>${label}</option>`;
    // fields name that will be excluded from the select box
    const exceptionalFields = [target_field, "post_id", "acfb_meta_select_field_type"];
	  
    if (!exceptionalFields.includes(field_name) && isMetaField) {
      el.append(option);
    }
	  
    // attaching change listener on each field
  });
});

acf.addAction("new_field/name=post_id", (field) => {
  field.$el.hide();
	
  const el = field.$el.find("input");
  const postID = acf.get("post_id");
	
  el.attr("value", postID);
});