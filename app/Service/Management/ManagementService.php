<?php

namespace App\Service\Management;

use Exception;
use Illuminate\Http\Request;
use PhpParser\JsonDecoder;


class ManagementService implements ManagementInterface
{
    CONST CLASS_NAME_SPACE = 'App\Service\Management\\';
    /** @var Request */
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function aggregateRequest()
    {
        $result = [];
        $content = $this->getRequestContent();

        if (!is_array($content) || empty($content)) {
            throw new Exception('Content is invalid');
        }

        foreach ($content as $contentItem) {
            if (class_exists(self::CLASS_NAME_SPACE . $contentItem['service'] )) {
                $aggregator = self::CLASS_NAME_SPACE . $contentItem['service'];
                $aggregator = new $aggregator;
            } else {
                throw new Exception('Can not find aggregator');
            }

            $result[] = $aggregator->process($contentItem);
        }

        return $result;
    }


    /**
     * Function return content from request
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return array
     * @throws ApiException
     */
    private function getRequestContent(): array
    {
        $content = $this->request->getContent();
        $jsonDecoder = new JsonDecoder();

        try {
            $requestContent = $jsonDecoder->decode($content);
        } catch (Exception $e) {
            throw new $e;
        }

        return $requestContent;
    }

}