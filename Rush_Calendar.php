<?php
require_once ('layout.php');
page_header();
echo<<<END
<div style="clear:both" />
<iframe src="http://docs.google.com/gview?url=http://localhost/S14.docx&embedded=true" style="width:840px; height:600px;color:#EBEBEB;" frameborder="0"></iframe>
</div>
END;
page_footer();
?>