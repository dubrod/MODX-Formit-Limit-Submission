# MODX-Formit-Limit-Submission
MODX Snippet to Limit Formit Submissions

#HTML

```
[[!FormIt?
   &hooks=``
   &formName=`RSVP0321`
   &formFields=`name,email,phone`
   &emailFrom=`[[++emailsender]]`
   &emailTpl=`rsvp-email-tpl`
   &emailTo=``
   &redirectTo=``
   &emailSubject=`RSVP0321 Form`
   &validate=`name:required,email:email:required,phone:required`
]]

[[!FormItSubmissionCount? &name=`RSVP0321`]]
[[!+fi.count:lt=`76`:then=`<form action="[[~[[*id]]]]" method="post" class="py-3"></form>`:else=`<p>The event is now full. We apologize for any inconvience.</p>`]]
