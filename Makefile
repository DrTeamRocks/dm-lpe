styles:
	find public/admin/css -name "*.scss" | while read style; do scss $$style > `dirname $$style`/`basename $$style .scss`.css; done
