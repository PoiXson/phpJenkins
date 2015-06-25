<?php
/**
 * Jenkins API Library
 *
 * @copyright 2015
 * @license GPL-3
 * @author lorenzo at poixson.com
 * @link http://poixson.com/
 */
namespace pxn\phpJenkins\tests;

class SourceFake extends \pxn\phpJenkins\Source {



	protected function wget() {
		return <<<EOF
{
  "description" : null,
  "jobs" : [
    {
      "actions" : [],
      "description" : "",
      "displayName" : "TestJobA",
      "displayNameOrNull" : "TestJobA",
      "name" : "test-job-A",
      "url" : "http://127.0.0.1:8080/job/test-job-A/",
      "buildable" : true,
      "builds" : [
        {
          "number" : 2,
          "url" : "http://127.0.0.1:8080/job/test-job-A/2/"
        },
        {
          "number" : 1,
          "url" : "http://127.0.0.1:8080/job/test-job-A/1/"
        }
      ],
      "color" : "blue",
      "firstBuild" : {
        "number" : 1,
        "url" : "http://127.0.0.1:8080/job/test-job-A/1/"
      },
      "healthReport" : [
        {
          "description" : "Build stability: No recent builds failed.",
          "iconClassName" : "icon-health-80plus",
          "iconUrl" : "health-80plus.png",
          "score" : 100
        }
      ],
      "inQueue" : false,
      "keepDependencies" : false,
      "lastBuild" : {
        "number" : 2,
        "url" : "http://127.0.0.1:8080/job/test-job-A/2/"
      },
      "lastCompletedBuild" : {
        "number" : 2,
        "url" : "http://127.0.0.1:8080/job/test-job-A/2/"
      },
      "lastFailedBuild" : null,
      "lastStableBuild" : {
        "number" : 2,
        "url" : "http://127.0.0.1:8080/job/test-job-A/2/"
      },
      "lastSuccessfulBuild" : {
        "number" : 2,
        "url" : "http://127.0.0.1:8080/job/test-job-A/2/"
      },
      "lastUnstableBuild" : null,
      "lastUnsuccessfulBuild" : null,
      "nextBuildNumber" : 3,
      "property" : [],
      "queueItem" : null,
      "concurrentBuild" : false,
      "downstreamProjects" : [],
      "scm" : {},
      "upstreamProjects" : []
    },
    {
      "actions" : [],
      "description" : "",
      "displayName" : "test-job-B",
      "displayNameOrNull" : null,
      "name" : "test-job-B",
      "url" : "http://127.0.0.1:8080/job/test-job-B/",
      "buildable" : true,
      "builds" : [
        {
          "number" : 3,
          "url" : "http://127.0.0.1:8080/job/test-job-B/3/"
        },
        {
          "number" : 2,
          "url" : "http://127.0.0.1:8080/job/test-job-B/2/"
        },
        {
          "number" : 1,
          "url" : "http://127.0.0.1:8080/job/test-job-B/1/"
        }
      ],
      "color" : "blue",
      "firstBuild" : {
        "number" : 1,
        "url" : "http://127.0.0.1:8080/job/test-job-B/1/"
      },
      "healthReport" : [
        {
          "description" : "Build stability: No recent builds failed.",
          "iconClassName" : "icon-health-80plus",
          "iconUrl" : "health-80plus.png",
          "score" : 100
        }
      ],
      "inQueue" : false,
      "keepDependencies" : false,
      "lastBuild" : {
        "number" : 3,
        "url" : "http://127.0.0.1:8080/job/test-job-B/3/"
      },
      "lastCompletedBuild" : {
        "number" : 3,
        "url" : "http://127.0.0.1:8080/job/test-job-B/3/"
      },
      "lastFailedBuild" : {
        "number" : 2,
        "url" : "http://127.0.0.1:8080/job/test-job-B/2/"
      },
      "lastStableBuild" : {
        "number" : 3,
        "url" : "http://127.0.0.1:8080/job/test-job-B/3/"
      },
      "lastSuccessfulBuild" : {
        "number" : 3,
        "url" : "http://127.0.0.1:8080/job/test-job-B/3/"
      },
      "lastUnstableBuild" : null,
      "lastUnsuccessfulBuild" : {
        "number" : 2,
        "url" : "http://127.0.0.1:8080/job/test-job-B/2/"
      },
      "nextBuildNumber" : 4,
      "property" : [],
      "queueItem" : null,
      "concurrentBuild" : false,
      "downstreamProjects" : [],
      "scm" : {},
      "upstreamProjects" : []
    }
  ],
  "name" : "All",
  "property" : [],
  "url" : "http://127.0.0.1:8080/"
}
EOF;
	}



}
