Customer's Query:

I'm in the process of importing our legacy tickets into Zendesk. I'm using the Zendesk API PHP Client for most tasks. Each of our legacy tickets has an id. This id should be visible to the end user and to the agent, and should be searchable by the API.

Question:

1: Should I use the field external_id or created a custom fields e.g. "Legacy Case No" -- or both?

2: I've tried searching on external_id , e.g. $client->search()->find('type:ticket external_id:12345, ['sort_by' => 'updated_at']); -- no results.

3 I've tried searching on a fieldvalue custom field e.g. client->search()->find('type:ticket fieldvalue:ahg35h3jh', ['sort_by' => 'updated_at']); -- that worked. However, I need to verify that the legacy field number is actually assigned to the "Legacy Case No" custom field and not in any other field. Is there a way to specify which field in fieldvalue in the search() method.

4: Is there a way to search tickets using $client->tickets()-> .... rather than the search() method.
