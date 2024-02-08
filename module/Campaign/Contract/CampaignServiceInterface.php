<?php

namespace Module\Campaign\Contract;

interface CampaignServiceInterface
{
    public function all();

    public function find($id);
    public function show($id);
    public function store(array $data);

    public function update($id, array $data);

    public function delete($id);

    public function isCompleted($campaign): bool;

    public function checkCodeIsCompleted($campaign,$code):bool;

    public function updateCodeCount($campaign,$code);
}
