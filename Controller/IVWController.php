<?php

namespace xrow\IVWBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use eZ\Publish\API\Repository\Values\Content\Query;
use eZ\Publish\API\Repository\Values\Content\Query\Criterion;
use eZ\Publish\API\Repository\Values\Content\Query\SortClause;

class IVWController extends Controller
{
    public function createAction($id)
    {
        $repository = $this->container->get( 'ezpublish.api.repository' );
        $contentService = $repository->getContentService();
        $searchService = $repository->getSearchService();
        $criterionArray = array(
            new Criterion\ContentId( array($id) )
        );
        
        // Create query for eZ DB
        $query = new Query();
        $query->criterion = new Criterion\LogicalAnd($criterionArray);
        
        $hit = $searchService->findContent($query)->searchHits;
        if (isset($hit[0])) {
            $hit = $hit[0]->valueObject; //skip the query object
        }

        $tags = $hit->getFieldValue("tags_custom_input")->value;
        $tags_from_config = $this->container->getParameter('ivw.tags');

        foreach ($tags_from_config as $tag_config)
        {
            if($tag_config["tags"]["ivw"] == $tags["ivw_tag"] || $tag_config["tags"]["nedstat"] == $tags["ad_tag"] )
            {
                $cp = $tag_config["tags"]["ivw"];
                break;
            }
            else {
                $cp = "none";
            }
        }
        return $this->render('IVWBundle::IVW.html.twig', array('cp' => $cp));
    }
}
