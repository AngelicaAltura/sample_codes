This php file is use to Search all tickets under a user with the specified External ID. 

Resource Zendesk Ticket: https://support.zendesk.com/agent/tickets/2723331

Question:

1: Should I use the field external_id or created a custom fields e.g. "Legacy Case No" -- or both?

2: I've tried searching on external_id , e.g. $client->search()->find('type:ticket external_id:12345, ['sort_by' => 'updated_at']); -- no results.

3 I've tried searching on a fieldvalue custom field e.g. client->search()->find('type:ticket fieldvalue:ahg35h3jh', ['sort_by' => 'updated_at']); -- that worked. However, I need to verify that the legacy field number is actually assigned to the "Legacy Case No" custom field and not in any other field. Is there a way to specify which field in fieldvalue in the search() method.

4: Is there a way to search tickets using $client->tickets()-> .... rather than the search() method.
