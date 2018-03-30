# DEPRECATED: SendinBlue SMTP Library 1.0 #

### Note: ###

The library is now maintained at <code>https://github.com/mailin-api/</code>

The latest Documentation for transactional emails is available here <code>https://apidocs.sendinblue.com/tutorial-sending-transactional-email/</code>

This library can be used in your PHP script to send the emails using SENDINBLUE-SMTP Services.

**(c) 2014 SendinBlue**

<hr>

# How To Install The SendinBlue SMTP Library #

## Step 1: ##
Download the SendinBlue SMTP Library “Mailin.php” from 
<code>https://github.com/DTSL/mailin-smtp-api.git</code>

## Step 2: ##
Include the "Mailin.php" file that you have downloaded.
```php
<?php
include 'path/to/mailin-api/Mailin.php';
?>
```

## Step 3: ##
Initialized the Mailin object with your SendinBlue SMTP credentials. Credentials can be found at <code>http://mysmtp.sendinblue.com/parameters</code>
```php
<?php
$mailin = new Mailin('username', 'password');
?>
```

## Step 4: ##
With the help of Mailin object create your email message: 
```php
<?php
$mailin->
  addTo('foo@bar.com', 'Foo')-> 

  addCc('cc@example.com','example cc')-> 

  addBcc('bcc@example.com','example bcc')->

/**
If you need to send the email to more than 1 recipient, you can add them in an array format.
    addTo(
        array(
            'test_one@example.com' => 'example one',
            'test_two@example.com' => 'example two'
   )
    )->

Similarly an array can be created to send multiple carbon copy recipients.
    addCc(
        array(
            'test_one@example.com' => 'example one',
            'test_two@example.com' => 'example two'
	 )
    )->

Again for multiple blind carbon copy recipients we can use array.
    addBcc(
        array(
            'test_one@example.com' => 'example one',
            'test_two@example.com' => 'example two'
	 )
    )->
    
If you want to add tag in mail headers, you can add as
    addHeader('X-Mailin-tag' , 'xyz')->
    
If you want to add IP in mail headers, you can add as
    addHeader('X-Mailin-IP' , 'x.x.x.x')->    

*/

  setFrom('me@example.com', 'mailin')->
  setReplyTo('reply@example.com','reply name')->
  setSubject('Subject goes here')->
  setText('Hello World!')->
  setHtml('<strong>Hello World!</strong>')->
  addAttachment("path/foo.txt")->

/**
   If you wan to attach multiple attachments, you can use an array with the addAttachment function. For example:
addAttachment(array("path/filename1.txt","path/filename2.txt"))

*/

/**

#### How to send attachment/s generated on the fly ####

If you want to send attachment/s generated on the fly you have to pass your attachment/s filename & its base64 encoded chunk data in key-value pair in an array with createAttachment function. For example:

createAttachment(array(“YourFileName1.Extension” => “Base64EncodedChunkData1″, “YourFileName2.Extension” => “Base64EncodedChunkData2″))

Below, sample code using [html2pdf](http://html2pdf.fr) function (You can send other kind of files but for our example, we choose to send a pdf file)

**NOTE:** Please add line of codes between commented area from start & end of pdf creation before Step 4.

*/
  
// Start pdf creation
require_once('html2pdf/html2pdf.class.php'); // link to html2pdf file
$content = "<h1>My PDF header</h1><br>This is my PDF content<br>";
$html2pdf = new HTML2PDF('P','A4','fr');
$html2pdf->WriteHTML($content);
$contentPdf = $html2pdf->Output('', true);
$attachment_content = chunk_split(base64_encode($contentPdf));
// End pdf creation

createAttachment(array('example.pdf'=>$attachment_content));

?>
```

## Step 5: ##
Now call the send function using the Mailin object:
```php
<?php

$res = $mailin->send();

/**
The return format is JSON.


Successful email sent message will be returned as:
{'result' => true, 'message' => 'Email sent successfully.'}

In case of unsuccessful email sent, the result will be false with the appropriate failure message.

*/
?>
```
 
## Error Codes ##
Below is a list of common SendinBlue SMTP error codes and their meanings.

```php
Error Code: 421
Error Description: Unable to send email. Exception message was:  Hourly Quota Exceeded.

Error Code: 550
Error Description: The size of your file should not be greater than 10 Mb.

Error Code: 902
Error Description: Unable to send email. Exception message was:  Account Terminated.

Error Code: 903
Error Description: Unable to send email. Exception message was: The parameters you passed are not well formated. Please refer to https://github.com/DTSL/mailin-smtp-api or contact us at contact at sendinblue.com.
```
