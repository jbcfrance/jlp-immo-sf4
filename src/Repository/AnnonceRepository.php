<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * AnnonceRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AnnonceRepository extends EntityRepository
{
  
    public function getCoupsDeCoeurs()
    {
        $oQb = $this
        ->createQueryBuilder('a')
        ->innerJoin('a.typeBien', 'tbbien')
        ->innerJoin('a.typeMandat', 'tmandat')
        ->leftJoin('a.images', 'img')
        ->addSelect('tbbien')   
        ->addSelect('tmandat')  
        ->addSelect('img')
        ->where('a.coupDeCoeur', true)
        ;

        return $oQb
        ->getQuery()
        ->getResult()
        ;
    }

    public function getAnnonceByTypeBienWithFirstImage($typeBien)
    {
        $subquery = $this->_em->createQueryBuilder('image')
            ->select('MIN(image.id)')
            ->from('App\Entity\Images', 'image')
            ->groupBy('image.annonce')
            ->getDQL();

        $oQb = $this->createQueryBuilder('a');
        $oQb
            ->addSelect('tbbien')
            ->addSelect('tmandat')
            ->addSelect('img')
            ->innerJoin('a.typeBien', 'tbbien')
            ->innerJoin('a.typeMandat', 'tmandat')
            ->leftJoin('a.images', 'img')
            ->where('a.typeBien = :typeBien')
            ->andWhere( $oQb->expr()->in('img.id', $subquery))
        ;

        $oQb->setParameters(
            array(
                'typeBien'=>$typeBien
            )
        );

        return $oQb
            ->getQuery()
            ->getResult()
            ;
    }

}