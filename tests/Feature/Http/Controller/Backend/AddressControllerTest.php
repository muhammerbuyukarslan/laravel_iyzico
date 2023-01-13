<?php

namespace Http\Controller\Backend;

use App\Models\Address;
use Tests\TestCase;

class AddressControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function text_index_page()
    {
        $response = $this->get('/users/2/addresses');
        $response->assertStatus(200);
    }
    public function test_index_url_goes_to_correct_view()
    {
        $response = $this->get('/users/2/addresses');
        $response->assertViewIs("backend.addresses.index");
    }
    public function test_addresses_create_form_page_status()
    {
        $response = $this->get('/users/2/addresses/create');
        $response->assertOk();
    }
    public function test_users_create_form_goes_to_correct_view()
    {
        $response = $this->get('/users/2/addresses/create');
        $response->assertViewIs("backend.addresses.index");
    }
    public function test_users_new_resource_is_created()
    {
        $addr = Address::factory()->make();
        $data = $addr->toArray();
        $response = $this -> post('/users/2/addresses',$data);
        $response->assertRedirect("/users/2/addresses");
    }
    public function test_existing_resource_is_updated()
    {
        $entity = Address::all()->last();
        $entity -> city = "CITY" . $entity->city;
        $entity ->district = "DISTRICT" . $entity->district;
        $data = $entity -> toArray();
        $response = $this->put("/users/2/addresses/" . $entity->address_id , $data);
        $response ->assertRedirect("/users/2/addresses");
    }
    public function test_latest_resource_is_deleted()
    {
        $entity = Address::all()->last();
        $id = $entity->address_id;
        $response = $this->delete("/users/2/addresses" . $id);
        $response -> assertJson(["message"=>"Done","id"=>$id]);
        $this->assertDeleted($entity);
    }
}
