<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use Ramsey\Uuid\Uuid;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var list<string>
     */
    protected $helpers = [];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.
        $this->validation = \Config\Services::validation();
        $this->uuid =  Uuid::uuid4();
        $this->role = session()->get('role');
        $this->nama_lengkap = session()->get('nama_lengkap');
        $this->uuid_user = session()->get('uuid');
    }

    public function getProgramStudi()
    {
        $model = new \App\Models\ModelProgramStudi();
        return $model->select('uuid,kode_prodi,nama_prodi,jenjang')->findAll();
    }

    public function getRuangan()
    {
        $model = new \App\Models\ModelRuangan();
        return $model->select('uuid,nama_ruangan')->findAll();
    }

    public function checkAkses($role)
    {
        // Jika role user ada di array $role, return true
        if (in_array($this->role, $role)) {
            return true;
        }
        // Jika role user tidak ada, return false
        return false;
    }
}
