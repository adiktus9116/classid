Classid
----------------------------------------------------

Classid is a Yellow Pages or Classified Ads online system. 

For basic installation into a directory called `htdocs`:

* Clone the Habari repo to your server: `https://github.com/cefram/classid.git htdocs`
* Initialize and update the source codes: `cd htdocs; git submodule update --init`

Please note that using Aptana will be a lot easier, it's just a few clicks away.

* Download [Aptana Studio 3](http://www.aptana.com/) and install it. Execute the software too.
* Click Import (If no import button exists, Right Click at the Project Explorer and then Click Import)
* Click Git > Git Repository as New Project
* Click Next, and then select URI and past `https://github.com/cefram/classid.git`
* Be noted that you'll need to have a Github account first, log that in if Aptana tells you to
* And that's it! It will be added to your local repository/folders.

In order for you to commit your changes:

* Right click the project folder (classid) at your Project Explorer window
* Hover to `Team` and then click `Commit`
* All changes you want to commit should be added to the Staging area. Include your notes, as much as possible, something to do with your edits
* After successful commit, Right click project folder again, and then Hover to `Team`, then click `Push`.

We will review the changes before pulling it to the main branch.
