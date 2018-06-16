## Convert all docs from Evernote folder into markdown

- In evernote, select all the notes you want and go to File -> Export notes
- Choose to export to this folder in a new folder named 'readers'
- run ```PHP -S localhost:8000``` to run the server or run ```php index.php```
- html is converted and concatenated in file readers/resulting_markdown_file.md
- cd readers/
- run bash pandoc_ebook.bash
- this will create the epub file in that folder
- save as ebook / print as paperback / create kindle book etc