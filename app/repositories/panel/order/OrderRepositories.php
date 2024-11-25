<?php
interface OrderRepositories
{
    public function data();
    public function get(int $id);
    public function delete(int $id);
    public function update(int $id, array $request);
    public function store(array $request);
}
