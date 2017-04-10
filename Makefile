styles:
	find public/css -name "*.scss" | while read style; do scss $$style > `dirname $$style`/`basename $$style .scss`.css; done
