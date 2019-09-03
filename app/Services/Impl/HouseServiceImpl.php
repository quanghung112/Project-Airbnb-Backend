<?php


namespace App\Services\Impl;

use App\Repositories\HouseRepositoryInterface;
use App\Services\HouseService;

class HouseServiceImpl implements HouseService
{
    private $houseRepository;
    public function __construct(HouseRepositoryInterface $houseRepository)
    {
        $this->houseRepository = $houseRepository;
    }
    public function getAll()
    {
        $houses = $this->houseRepository->getAll();
        return $houses;
    }

    public function create($request)
    {
        $this->houseRepository->create($request);
    }
    public function update($request, $id)
    {
        $oldhouse = $this->findById($id);
        $this->houseRepository->update($request, $oldhouse);
    }
    public function delete($id)
    {

    }
    public function findById($id)
    {
        return $this->houseRepository->findById($id);
    }

    public function getNewHouse($userId)
    {
       return $this->houseRepository->getNewHouse($userId);
    }

    public function getHouseOfUser($userId)
    {
        return $this->houseRepository->getHouseOfUser($userId);
    }
}
