clean:
	@echo "Cleaning emacs backup files..."
	@find . -iname \*~ -exec rm -rfv {} \;
