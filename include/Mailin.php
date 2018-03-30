<?php

class Mailin
{
  //the available ports
  const TLS = 587;
  const SSL = 465;
  const WEBACTION = 'SENDMAIL';
  const WBA = 'MAILUPLOADS';
  const DOMAIN = 'https://mozillakerala.co/';
  
  private $username, $password, $api, $webaction, $wba, $domain, $domainAttachment;
  private $to_list,
          $from,
          $from_name,
          $reply_to,
          $cc_list,
          $bcc_list,
          $subject,
          $text,
          $html,
          $attachment_list,
          $raw_attachment_list,
          $header_list = array();

  protected $use_headers;

  public function __construct($username, $password)
  {
    $this->username = $username;
    $this->password = $password;
	$this->webaction = self::WEBACTION;
	$this->wba = self::WBA;
	$this->domain = self::DOMAIN;
	$this->port = self::TLS;
	$this->from_name = false;
	$this->reply_to = false;
  }

  /**
   * getTos
   * Return the list of recipients
   * @return list of recipients
   */
  public function getTos()
  {
    return $this->to_list;
  }
 
 /**
   * setTo
   * Initialize a single email for the recipient 'to' field
   * Destroy previous recipient 'to' data.
   * @param String $email - a list of email addresses
   * @return the Mailin object.
   */
  public function setTo($email)
  {
    $this->to_list = array(array('email' => $email));
    return $this;
  }
  
  /**
   * addTo
   * append an email address to the existing list of addresses
   * Preserve previous recipient 'to' data.
   * @param String/Array $emails - a single email address or array of email addresses with name
   * @return the Mailin object.
   */
  public function addTo($emails, $name=null)
  {
	if(is_array($emails)) {
		foreach($emails as $email => $name) {
			if(!empty($name)) {
				$this->to_list[] = array('email' => $email, 'name' => $name);
			}
			else {
				$this->to_list[] = array('email' => $email);
			}
		}
    }
	else {
		if(!empty($name)) {
			$this->to_list[] = array('email' => $emails, 'name' => $name);
		}
		else {
			$this->to_list[] = array('email' => $emails);
		}
	}
   
    return $this;
  }
  
  /**
   * setFrom
   * set the from email
   * @param String $email - an email address
   * @return the Mailin object.
   */
  public function setFrom($email, $name=null)
  {
    $this->from = $email;
	if(!empty($name)) {
		$this->from_name = $name;
	}
    return $this;
  }

  /**
   * getFrom
   * get the from email address
   * @param Boolean $as_array - return the from as an assocative array
   * @return the from email address
   */
  public function getFrom($as_array = false)
  {
    if($as_array && ($name = $this->getFromName())) {
      return array("$this->from" => $name);
    } else {
      return $this->from;
    }
  }

  /**
   * getFromName
   * get the from name 
   * @return the from name
   */
  public function getFromName()
  {
    return $this->from_name;
  }
  
  /**
   * getReplyTo
   * get the reply-to address
   * @return the reply to address
   */
  public function getReplyTo()
  {
    return $this->reply_to;
  }

  /**
   * setReplyTo
   * set the reply-to address
   * @param String $email - the email to reply to
   * @return the Mailin object.
   */
  public function setReplyTo($email, $name=null)
  {
	if(!empty($name)) {
		$this->reply_to = array('email' => $email, 'name' => $name);
	}
	else {
		$this->reply_to = array('email' => $email);
	}
	
    return $this;
  }
  /**
   * getCc
   * get the Carbon Copy list of recipients
   * @return Array the list of recipients
   */
  public function getCcs()
  {
    return $this->cc_list;
  }
  
  /**
   * setCcs
   * Set the list of Carbon Copy recipients
   * @param Array $email (array('name' => 'abc', 'email' => 'abc@mailin.fr')) - a list of email addresses
   * @return the Mailin object.
   */
  public function setCcs(array $email_list)
  {
    $this->cc_list = array($email_list);
    return $this;
  }
  
  /**
   * setCc
   * Initialize the list of Carbon Copy recipients
   * destroy previous recipient data
   * @param String $email - a list of email addresses
   * @return the Mailin object.
   */
  public function setCc($email)
  {
    $this->cc_list = array(array('email' => $email));
    return $this;
  }
  
  /**
   * addCc
   * Append an address to the list of Carbon Copy recipients
   * @param String $email - an email address
   * @return the Mailin object.
   */
  public function addCc($emails, $name=null)
  {
	if(is_array($emails)) {
		foreach($emails as $email => $name) {
			if(!empty($name)) {
				$this->cc_list[] = array('name' => $name, 'email' => $email);
			}
			else {
				$this->cc_list[] = array('email' => $email);
			}
		}
	}
	else {
		if(!empty($name)) {
			$this->cc_list[] = array('name' => $name, 'email' => $emails);
		}
		else {
			$this->cc_list[] = array('email' => $emails);
		}
	}
    return $this;
  }

  /**
   * getBccs
   * return the list of Blind Carbon Copy recipients
   * @return Array - the list of Blind Carbon Copy recipients
   */
  public function getBccs()
  {
    return $this->bcc_list;
  }
  
  /**
   * setBccs
   * set the list of Blind Carbon Copy Recipients
   * @param Array $email_list ex(array('name' => 'abc', 'email' => 'abc@mailinfr')) - the list of email recipients to 
   * @return the Mailin object.
   */
  public function setBccs($email_list)
  {
    $this->bcc_list = array($email_list);
    return $this;
  }
  
  /**
   * setBcc
   * Initialize the list of Carbon Copy recipients
   * destroy previous recipient Blind Carbon Copy data
   * @param String $email - an email address
   * @return the Mailin object.
   */
  public function setBcc($email)
  {
    $this->bcc_list = array(array('email' => $email));
    return $this;
  }
  
  /**
   * addBcc
   * Append an email address to the list of Blind Carbon Copy 
   * recipients
   * @param String/Array $emails - an email address
   */
  public function addBcc($emails, $name=null)
  {
	if(is_array($emails)) {
		foreach($emails as $email => $name) {
			if(!empty($name)) {
				$this->bcc_list[] = array('name' => $name, 'email' => $email);
			}
			else {
				$this->bcc_list[] = array('email' => $email);
			}
		}
	}  
	else {
		if(!empty($name)) {
			$this->bcc_list[] = array('name' => $name, 'email' => $emails);
		}
		else {
			$this->bcc_list[] = array('email' => $emails);
		}
}	
    return $this;
  }

  /** 
   * getSubject
   * get the email subject
   * @return the email subject
   */
  public function getSubject()
  {
    return $this->subject;
  }

  /** 
   * setSubject
   * set the email subject
   * @param String $subject - the email subject
   * @return the Mailin object
   */
  public function setSubject($subject)
  {
    $this->subject = $subject;
    return $this;
  }

  /** 
   * getText
   * get the plain text part of the email
   * @return the plain text part of the email
   */
  public function getText()
  {
    return $this->text;
  }

  /** 
   * setText
   * Set the plain text part of the email
   * @param String $text - the plain text of the email
   * @return the Mailin object.
   */
  public function setText($text)
  {
    $this->text = $text;
    return $this;
  }
  
  /** 
   * getHtml
   * Get the HTML part of the email
   * @param String $html - the HTML part of the email
   * @return the HTML part of the email.
   */
  public function getHtml()
  {
    return $this->html;
  }

  /** 
   * setHTML
   * Set the HTML part of the email
   * @param String $html - the HTML part of the email
   * @return the Mailin object.
   */
  public function setHtml($html)
  {
    $this->html = $html;
    return $this;
  }

  /**
   * getAttachments
   * Get the list of file attachments
   * @return Array of indexed file attachments
   */
  public function getAttachments()
  {
    return $this->attachment_list;
  }

  /**
   * setAttachments
   * add multiple file attachments at once
   * destroys previous attachment data.
   * @param array $files - The list of files to attach
   * @return  the Mailin object
   */

  /**
   * getrawAttachments
   * Get the list of raw file attachments
   * @return Array of indexed file attachments
   */
  public function getrawAttachments()
  {
    return $this->raw_attachment_list;
  }

  public function setAttachments(array $files)
  {
    $this->attachment_list = array();
    foreach($files as $file)
    {
      $this->addAttachment($file);
    }

    return $this;
  }

  /**
   * setAttachment
   * Initialize the list of attachments, and add the given file
   * destroys previous attachment data.
   * @param String $file - the file to attach
   * @return the Mailin object.
   */
  public function setAttachment($file)
  {
    $this->attachment_list = array($this->_getAttachmentInfo($file));
    return $this;
  }

  /**
   * addAttachment
   * Add a new email attachment, given the file name.
   * @param String/Array $file - The file(s) to attach.
   * @return  the Mailin object.
   */
  public function addAttachment($files)
  {
	if(is_array($files)) {
		foreach($files as $file) {
			$this->attachment_list[] = $this->_getAttachmentInfo($file);
		}
	}
	else {
		$this->attachment_list[] = $this->_getAttachmentInfo($files);
	}
    return $this;
  }

  /**
   * createAttachment
   * Creates a new email attachment, given the file name & its base64 encoded chunk.
   * @param String/Array $file - The file(s) to attach.
   * @return  the Mailin object.
   */
  public function createAttachment($files)
  {
    if(is_array($files)) {
       $this->raw_attachment_list[] = $files;
    }
    return $this;
  }  

  /**
   * _getAttachmentInfo
   * Return the file info for given the file name.
   * @param String $file - The file to attach.
   * @return  Array with file info.
   */
  private function _getAttachmentInfo($file)
  {
    $info = pathinfo($file);
    $info['file'] = $file;
    return $info;
  }

  /** 
   * setCategories
   * Set the list of category headers
   * destroys previous category header data
   * @param Array $category_list - the list of category values
   * @return the Mailin object.
   */
  public function setCategories($category_list)
  {
    $this->header_list['category'] = $category_list;
    return $this;
  }

  /** 
   * setCategory
   * Clears the category list and adds the given category
   * @param String $category - the new category to append
   * @return the Mailin object.
   */
  public function setCategory($category)
  {
    $this->header_list['category'] = array($category);
    return $this;
  }

  /** 
   * addCategory
   * Append a category to the list of categories
   * @param String $category - the new category to append
   * @return the Mailin object.
   */
  public function addCategory($category)
  {
    $this->header_list['category'][] = $category;
    return $this;
  }

  /** 
   * SetSubstitutions
   *
   * Substitute a value for list of values, where each value corresponds
   * to the list emails in a one to one relationship. (IE, value[0] = email[0], 
   * value[1] = email[1])
   *
   * @param array $key_value_pairs - key/value pairs where the value is an array of values
   * @return the Mailin object.
   */
  public function setSubstitutions($key_value_pairs)
  {
    $this->header_list['sub'] = $key_value_pairs;
    return $this;
  }

  /** 
   * addSubstitution
   * Substitute a value for list of values, where each value corresponds
   * to the list emails in a one to one relationship. (IE, value[0] = email[0], 
   * value[1] = email[1])
   *
   * @param string $from_key - the value to be replaced
   * @param array $to_values - an array of values to replace the $from_value
   * @return the Mailin object.
   */
  public function addSubstitution($from_value, array $to_values)
  {
    $this->header_list['sub'][$from_value] = $to_values;
    return $this;
  }

  /** 
   * setSection
   * Set a list of section values
   * @param Array $key_value_pairs
   * @return the Mailin object.
   */
  public function setSections(array $key_value_pairs)
  {
    $this->header_list['section'] = $key_value_pairs;
    return $this;
  }
  
  /** 
   * addSection
   * append a section value to the list of section values
   * @param String $from_value - the value to be replaced
   * @param String $to_value - the value to replace
   * @return the Mailin object.
   */
  public function addSection($from_value, $to_value)
  {
    $this->header_list['section'][$from_value] = $to_value;
    return $this;
  }

  /** 
   * setUniqueArguments
   * Set a list of unique arguments, to be used for tracking purposes
   * @param array $key_value_pairs - list of unique arguments
   */
  public function setUniqueArguments(array $key_value_pairs)
  {
    $this->header_list['unique_args'] = $key_value_pairs;
    return $this;
  }
    
  /**
   * addUniqueArgument
   * Set a key/value pair of unique arguments, to be used for tracking purposes
   * @param string $key   - key
   * @param string $value - value
   */
  public function addUniqueArgument($key, $value)
  {
    $this->header_list['unique_args'][$key] = $value;
    return $this;
  }

  /**
   * setFilterSettings
   * Set filter/app settings
   * @param array $filter_settings - array of fiter settings
   */
  public function setFilterSettings($filter_settings)
  {
    $this->header_list['filters'] = $filter_settings;
    return $this;
  }
  
  /**
   * addFilterSetting
   * Append a filter setting to the list of filter settings
   * @param string $filter_name     - filter name
   * @param string $parameter_name  - parameter name
   * @param string $parameter_value - setting value 
   */
  public function addFilterSetting($filter_name, $parameter_name, $parameter_value)
  {
    $this->header_list['filters'][$filter_name]['settings'][$parameter_name] = $parameter_value;
    return $this;
  }
  
  /**
   * getHeaders
   * return the list of headers
   * @return Array the list of headers
   */
  public function getHeaders()
  {
    return $this->header_list;
  }

  /**
   * getHeaders
   * return the list of headers
   * @return Array the list of headers
   */
  public function getHeadersJson()
  {
    if (count($this->getHeaders()) <= 0)
    {
      return "{}";
    }
    return json_encode($this->getHeaders(), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
  }
  
  /**
   * setHeaders
   * Sets the list headers
   * destroys previous header data
   * @param Array $key_value_pairs - the list of header data
   * @return the Mailin object.
   */
  public function setHeaders($key_value_pairs)
  {
    $this->header_list = $key_value_pairs;
    return $this;
  }
    
   /** addHeaders
   * Sets the list headers
   * destroys previous header data
   * @param Array $key_value_pairs - the list of header data
   * @return the Mailin object.
   */
  public function addHeaders($key_value_pairs)
  {
	$this->header_list = $key_value_pairs;
    return $this;
  }
  /**
   * addHeader
   * append the header to the list of headers
   * @param String $key - the header key
   * @param String $value - the header value
   */
  public function addHeader($key, $value)
  {
    $this->header_list[$key] = $value;
    return $this;
  }
  
  /**
   * removeHeaders
   * remove a header key
   * @param String $key - the key to remove
   * @return the Mailin object.
   */
  public function removeHeader($key)
  {
    unset($this->header_list[$key]);
    return $this;
  }

  /**
   * useHeaders
   * Checks to see whether or not we can or should you headers. In most cases,
   * we prefer to send our recipients through the headers, but in some cases,
   * we actually don't want to. However, there are certain circumstances in 
   * which we have to.
   */
  public function useHeaders()
  {
    return !($this->_preferNotToUseHeaders() && !$this->_isHeadersRequired());
  }

  public function setRecipientsInHeader($preference)
  {
    $this->use_headers = $preference;

    return $this;
  }

  /**
   * isHeaderRequired
   * determines whether or not we need to force recipients through the smtpapi headers
   * @return boolean, if true headers are required
   */
  protected function _isHeadersRequired()
  {
    if(count($this->getAttachments()) > 0 || $this->use_headers )
    {
      return true;
    }
    return false;
  }

  /**
   * _preferNotToUseHeaders
   * There are certain cases in which headers are not a preferred choice
   * to send email, as it limits some basic email functionality. Here, we
   * check for any of those rules, and add them in to decide whether or 
   * not to use headers
   * @return boolean, if true we don't 
   */
  protected function _preferNotToUseHeaders()
  {
    
    if ($this->use_headers !== null && !$this->use_headers)
    {
      return true;
    }
    
    return false;
  }
  
  /**
   * _prepMessageData
   * returns a url friendly querystring
   * @return String - the data query string to be posted
   */
  protected function _prepMessageData()
  {
    $params = 
    array(
      'api_user'  => $this->username,
      'api_key'   => $this->password,
	  'webaction' => $this->webaction,
      'subject'   => $this->getSubject(),
      'html'      => $this->getHtml(),
      'text'      => $this->getText(),
      'from'      => $this->getFrom(),
      'userheader'=> false,
	  'x-header' => $this->getHeadersJson()
    );

    if(($fromname = $this->getFromName())) {
      $params['fromname'] = $fromname;
    }

    //if(($replyto = $this->getReplyTo())) {
      //$params['replyto'] = $replyto;
    //}

    // determine if we should send our recipients through our headers,
    // and set the properties accordingly
    if($this->useHeaders())
    {
      // workaround for posting recipients through SendGrid headers
      $headers = $this->getHeaders();
      //$headers['to'] = $this->getTos();
      $this->setHeaders($headers);

      $params['userheader'] = true;
      $params['x-header'] = $this->getHeadersJson();
    }
    else
    {
      //$params['to'] = $this->getTos();
    }


    if($this->getAttachments())
    {
		$domainAttachment = $this->domain;
		$post_array = array();
		
		$post_array['api_user']  = $this->username;
		$post_array['api_key']   = $this->password;
		$post_array['webaction'] = $this->wba;
		
		foreach($this->getAttachments() as $k => $attachment)
		{
			if(file_exists($attachment['file'])) {
				$post_array['my_file'.($k+1)] = "@".$attachment['file'];
			}
			else {
				echo "<br>Error : Please correct the file path, not exists=>".$attachment['file'];
				exit;
			}
		}
		
		if(count($post_array) > 0) 
		{
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL,$domainAttachment);
			curl_setopt($ch, CURLOPT_POST,1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post_array);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$result = curl_exec ($ch);
			curl_close ($ch);
		}	
    }

    return $params;
  }

  /**
   * _arrayToUrlPart
   * Converts an array to a url friendly string
   * @param  array $array - the array to convert
   * @param  String $token - the name of parameter
   * @return String - a url part that can be concatenated to a url request
   */
  protected function _arrayToUrlPart($array, $token)
  {
    $string = "";

    if ($array)
    {
	
      foreach ($array as $k => $value)
      {
		if(!empty($value['name'])) {
			$string.= "&" . $token . "[$k][name]=" . urlencode($value['name'])."&" . $token . "[$k][email]=" . urlencode($value['email']);
		}
		else {
			$string.= "&" . $token . "[$k][email]=" . urlencode($value['email']);
		}
      }
    }

    return $string;
  }

  /**
   * _arrayToUrlPartTwo
   * Converts an array to a url friendly string
   * @param  array $array - the array to convert
   * @param  String $token - the name of parameter
   * @return String - a url part that can be concatenated to a url request
   */
  protected function _arrayToUrlPartTwo($array, $token)
  {
	//print_r($array);
    $string = "";
	if(!empty($array['name'])) {
		$string.= "&" . $token . "[name]=" . urlencode($array['name'])."&" . $token . "[email]=" . urlencode($array['email']);
	}
	else {
		$string.= "&" . $token . "[email]=" . urlencode($array['email']);
	}
    return $string;
  }
  
  /**
   * _arrayToUrlPartThree
   * Converts an array to a url friendly string
   * @param  array $array - the array to convert
   * @param  String $token - the name of parameter
   * @return String - a url part that can be concatenated to a url request
   */
  protected function _arrayToUrlPartThree($array, $token)
  {
	$string = "";
	if(count($array) > 0) {
		foreach ($array as $k => $value) {
				$string.= "&" . $token . "[$k][basename]=" . urlencode($value['basename'])."&" . $token . "[$k][extension]=" . urlencode($value['extension']);
		}
	}
    return $string;
  }
  
  /**
   * send
   * Send an email
   * @return String the json response
   */
  public function send()
  {
    $data = $this->_prepMessageData();

    //if we're not using headers, we need to send a url friendly post
    if(!$this->useHeaders())
    {
      $data = http_build_query($data);
    }

    $request = $this->domain;
	
	$atcmnt = $this->getAttachments();
    $rawAtcmnt = $this->getrawAttachments();
    if($this->getrawAttachments())
    {
      foreach ($rawAtcmnt[0] as $key => $value) {
        $rawAtcmnt[0][$key] = urlencode($value);
      }
      $data['raw_attachments'] = serialize($rawAtcmnt[0]);
    }
    // we'll append the Bcc, Cc, replyto, to, files to the url endpoint (GET)
    // so that we can still post array.
    $request.= "?" .
	substr($this->_arrayToUrlPart($this->getBccs(), "bcc"), 1) .
	$this->_arrayToUrlPart($this->getCcs(), "cc") .
	$this->_arrayToUrlPartTwo($this->getReplyto(), "replyto") .
	$this->_arrayToUrlPart($this->getTos(), "to") .
	$this->_arrayToUrlPartThree($atcmnt, "files");
	  
	$session = curl_init($request);
    curl_setopt ($session, CURLOPT_POST, true);
    curl_setopt ($session, CURLOPT_POSTFIELDS, $data);

    curl_setopt($session, CURLOPT_HEADER, false);
    curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
     
    // obtain response
    $response = curl_exec($session);
    curl_close($session);
	
	return $response;
  } 
  
}
