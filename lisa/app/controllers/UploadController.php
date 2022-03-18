<?php
declare(strict_types=1);

class UploadController extends ControllerBase
{
    public function uploadFileAction()
    {
        $this->view->disable();

        $i=1;
        $arrayFile= [];
        if($_FILES['file']['name'] != "")
        {
            foreach($_FILES['file']['name'] as $key => $val){
                $filename = $val;
                $extension = pathinfo($filename,PATHINFO_EXTENSION);
                $valid_extensions = array("png","jpg","jpeg","pdf");
                if(in_array($extension, $valid_extensions)){
                $new_name = rand(0,999999) . time() . "." . $extension;
                $path = "uploads/" . $new_name;
                move_uploaded_file($_FILES['file']['tmp_name'][$key], $path);
                if (in_array($extension, $valid_extensions)) 
                {
                    if($extension == 'png')
                    {
                        $new_input = array(
                            "file".$i => new CURLFILE("http://localhost/lisa/uploads/$new_name", 'image/png', $new_name),
                        );
                    } elseif ($extension == 'jpg' || $extension == 'jpeg')
                    {
                        $new_input = array(
                            "file".$i => new CURLFILE("http://localhost/lisa/uploads/$new_name", 'image/jpeg', $new_name),
                        );
                    } elseif ($extension == 'pdf')
                    {
                        $new_input = array(
                            "file".$i => new CURLFILE("http://localhost/lisa/uploads/$new_name", 'application/pdf', $new_name),
                        );
                    }
                    $i++;
                    $arrayFile = array_merge($arrayFile, $new_input);
                } 
             } else {
                   console.log("flase conditionn.");
                    return "false";
                }
            }
            $result = parent::curlApiFile("upload", $arrayFile);
            $this->session->set("documentId", $result->data->documentId);
            $this->session->set("documentPages", $result->data->pages);
        }
    }

    public function indexAction()
    {
    }

    
    public function extractFileAction()
    {
        $arrPage = $this->request->getPost('arrPage');
        $pieces =  json_decode($arrPage);
        $viewPageArr =[];
        $numPageArr =[];

        foreach($pieces as $key => $val){
            $split = explode(",", $val);
            array_push($numPageArr, $split[0]);
            array_push($viewPageArr, $split[1]);
        }

        $this->view->setVar("viewNumber", $numPageArr);
        $this->view->setVar("viewPage", $viewPageArr);
        $arrayPageSelect = [];
        if ($this->request->ispost()){
            $selectPage = $this->request->getPost('selectPage');
            $docID = $this->request->getPost('documentID');

            foreach($selectPage as $key => $val )
            {
                $pieces = explode(",", $val);
                array_push($arrayPageSelect,
                 (object)(array($pieces[0] => $pieces[1])));
            }
            $arrayFile = array(
                'pages' => $arrayPageSelect
            );
          
            $result = parent::curlApiExtract("upload/extract?documentId=$docID&type=0",json_encode($arrayFile));
            $this->view->setVars([
                "editDetail" => $result,
                "date" => substr($result->data->dateWrite, 0,16),
                "signature" => $result->data->signature,
                "documentId" => $result->data->documentId,
            ]);
        }
    }

    public function saveAction()
    {
        $this->view->disable();

        if ($this->request->ispost()){
            // $dateUpdate = $this->request->getPost('dateUpdate');
            $dateWrite = $this->request->getPost('dateWrite');
            $documentId = $this->request->getPost('documentId');
            $title = $this->request->getPost('title');
            $receiver = $this->request->getPost('receiver');
            $sendAddress = $this->request->getPost('sendAddress');
            // $pageSequence = $this->request->getPost('pageSequence');
            $personId = $this->request->getPost('personId');
            $personName = $this->request->getPost('personName');
            $personRole = $this->request->getPost('personRole');
            $signatureImg = $this->request->getPost('signatureImg');            

            $arrSignature =[];
            foreach($personId as $key => $val) {array_push( $arrSignature, 
                array("personId" => $personId[$key],
                 "personName" => $personName[$key],
                 "personRole" => $personRole[$key],
                 "signatureImg" => $signatureImg[$key]
                ));
            }
            
            $field = array(
                // "dateUpdate" => $dateUpdate,
                "dateWrite" => $dateWrite . ' 00:00:00 GMT',
                // "pageSequence" => $arrPage,
                "documentId" => $documentId,
                "receiver" => $receiver,
                "title" => $title,
                "sendAddress" => $sendAddress,
                "signature" => $arrSignature
            );
            $result =parent::curlApi("upload/extract", "POST", json_encode($field), $token = $this->session->get("access_token"));
            if ($result->status == 'success') {
                $this->flashSession->success('บันทึกเอกสารสำเร็จ !');
                $this->response->redirect("lisa/authen/document");
            } else {
                $this->flashSession->error($result->message);
            }
        }
    }
    
    public function extractSignatureAction()
    {
            $arrayPage = [];
            if ($this->request->ispost()){
                $selectPage = $this->request->getPost('selectPage');
                $docID = $this->request->getPost('documentId');   

                foreach($selectPage as $key => $val )
                {
                    $pieces = explode(",", $val);
                    array_push($arrayPage,
                     (object)(array($pieces[0] => $pieces[1])));
                }
                $arrayFile = array(
                    'pages' => $arrayPage
                );
            }
            
           $result = parent::curlApiExtract("upload/extract?documentId=$docID&type=1",json_encode($arrayFile));
        return json_encode($result);
    }
}