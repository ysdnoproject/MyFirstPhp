<?php

namespace AppBundle\Controller;

use AppBundle\Entity\UserFile;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

class DownloadController extends Controller
{
    /**
     * @Route("/download/{id}", name="download_file")
     * @ParamConverter("userFile", class="AppBundle:UserFile", options={"mapping": {"id":"id"}})
     */
    public function downloadAction(UserFile $userFile)
    {
        $storge = $this->get('vich_uploader.storage');

        $path = $storge->resolvePath($userFile, 'file');

        $response = new BinaryFileResponse($path);

        //example: filename is 55efbe33d0be3_xxx.pdf
        //result:  filename is xxx.pdf
        $filename = strstr($userFile->getFileName(), '_');
        $filename = substr($filename, 1, strlen($filename));

        $d = $response->headers->makeDisposition(
            ResponseHeaderBag::DISPOSITION_ATTACHMENT,
            $filename,
            'fallback');

        $response->headers->set('Content-Disposition', $d);

        return $response;
    }
}
