$(document).ready(function() {
	$("#fadd").validate({
		onfocusout: false,
		onkeyup: false,
		onclick: false,
		rules: {
			"title": {
				required: true,
			},
			"intro": {
				required: true,
			},
			"content": {
				required: true,
            },
            "meta_desc": {
				required: true,
            },
            "meta_key": {
				required: true,
            },
            "image_link": {
				required: true,
            },
            "created": {
				required: true,
            },
            "feature": {
				required: true,
            },
        },
        messages: {
			"title": {
				required: "Bắt buộc nhập title",
			},
			"intro": {
				required: "Bắt buộc nhập intro",
			},
			"content": {
				required: "Bắt buộc nhập content",
            },
            "meta_desc": {
				required: "Bắt buộc nhập Desciption",
            },
            "meta_key": {
				required: "Bắt buộc nhập key",
            },
            "image_link": {
				required: "Bắt buộc nhập hình",
            },
            "created": {
				required: "Bắt buộc nhập ngày nhập",
            },
            "feature": {
				required: "Bắt buộc nhập feature",
            },
		}
	});
});