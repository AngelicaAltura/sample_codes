Use to Search all tickets under a user with the specified External ID. 

Resource Zendesk Ticket: https://support.zendesk.com/agent/tickets/2723331

Question:

1: Should I use the field external_id or created a custom fields e.g. "Legacy Case No" -- or both?

2: I've tried searching on external_id , e.g. $client->search()->find('type:ticket external_id:12345, ['sort_by' => 'updated_at']); -- no results.

3 I've tried searching on a fieldvalue custom field e.g. client->search()->find('type:ticket fieldvalue:ahg35h3jh', ['sort_by' => 'updated_at']); -- that worked. However, I need to verify that the legacy field number is actually assigned to the "Legacy Case No" custom field and not in any other field. Is there a way to specify which field in fieldvalue in the search() method.

4: Is there a way to search tickets using $client->tickets()-> .... rather than the search() method.

Answer:

The {query} on  $client->tickets()->search({query}) signifies the Zendesk search syntax that you'll be using. However, upon double checking this up, you are correct. Query parameter is not supported for the ticket endpoint. Instead of this query, you can use the command:
$client->search()->find({query})
where in {query} is the Zendesk search syntax.

For example:
$client->search()->find('type:ticket external_id:012345');
However, if you still encounter an error using this, can you provide the whole script that you are using for this (excluding your log in credentials)? This way, we can check if there are bug on the codes that causes the error/s.

