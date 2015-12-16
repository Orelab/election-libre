<?php defined('BASEPATH') OR exit('No direct script access allowed');

// Confirmation

$lang["email_confirmation_intro"] = "<p>We have succefully saved your anonymous ballot. 
We also registered that you voted, but we are unable to recognise your own ballot. 
The only action we did is to place on your ballot your secret fingerprint that we can't 
decode, because there is no information about you in this fingerprint</p>


<p>Only a people who know your identity and your secret signature can recognize your 
fingerprint. That said, only you should do that as we never save nether your signature, 
nor your fingerprint. In this situation, we are totazlly unable to know <i>who</i> 
voted <i>what</i>.</p>

<p style='text-align: center'>[name] + [surname] + [secret signature] = 
[your anonymous fingerprint on your ballot]</p>

<p>If you want it, you can visit de the list page and control the number of votes. 
You can also check your onw vote with you personal signature, which should remains 
secret.</p>";

$lang["email_confirmation_identifier"] = "Login";

$lang["email_confirmation_signature"] = "Signature";

$lang["email_confirmation_signature_value"] = "[you're the only one to know it]";

$lang["email_confirmation_fingerprint"] = "The fingerprint of your ballot";

$lang["email_confirmation_vote_list"] = "See the vote list";

$lang["email_confirmation_availability"] = "The results will be published on this page on";

$lang["email_confirmation_availability_date"] = "d/m à H:i";


// Creation

$lang["email_creation_intro"] = "<p>Thank you for using Election-libre ! Your elections are now on rails 
and will start at the date you specified.</p>

<p>Please note that you will be allowed to administrate your election during the vote period.</p>
	
<p>You can manage your election with the following private access. Please, don't share it !</p>";

$lang["email_creation_address"] = "Address";

$lang["email_creation_login"] = "Login";

$lang["email_creation_password"] = "Password";

$lang["email_creation_best_regards"] = "Best regards";

$lang["email_creation_el_team"] = "<i>The <b>Election Libre</b> team</i>";


// Invitation

$lang["email_invitation_start"] = "Start voting : ";

$lang["email_invitation_start_date"] = "y/m/d at H:i";

$lang["email_invitation_end"] = "End of voting : ";

$lang["email_invitation_end_date"] = "y/m/d at H:i";

$lang["email_invitation_go_vote"] = "Go voting now";


// Re-send invitation

$lang["email_resend_detail"] = "This is a copy of the original message previously sent to you. 
If you did'nt asked to received this copy, please just ignore it.";



