import * as THREE from "../node_modules/three/build/three.module";
import { OrbitControls } from "../node_modules/three/examples/jsm/controls/OrbitControls";
import { PLYLoader } from "../node_modules/three/examples/jsm/loaders/PLYLoader";

document.addEventListener("DOMContentLoaded", async () => {
  const displayTarget = document.getElementById("3dTarget");
  let data;
  await ajaxRequest();
  let averageOffset = [0, 0];
  for (let i = 0; i < data.offsets.house.length; i++) {
    averageOffset[0] += data.offsets.house[i].x / data.offsets.house.length;
    averageOffset[1] += data.offsets.house[i].y / data.offsets.house.length;
  }

  const scene = new THREE.Scene();

  var light = new THREE.SpotLight();
  light.position.set(-20, -20, 50);
  scene.add(light);

  const camera = new THREE.PerspectiveCamera(
    30,
    window.innerWidth / window.innerHeight,
    0.1,
    10000
  );

  camera.position.set(0, -40, 20);
  camera.lookAt(0, 0, 0);

  const renderer = new THREE.WebGLRenderer();
  renderer.outputEncoding = THREE.sRGBEncoding;
  renderer.setSize(displayTarget.clientWidth, displayTarget.clientHeight);
  renderer.domElement.displayTarget.appendChild(renderer.domElement);

  const controls = new OrbitControls(camera, renderer.domElement);

  const material = new THREE.MeshPhongMaterial({
    color: 0x021844,
    specular: 0x7d4031,
    shininess: 10,
    flatShading: true,
    side: THREE.DoubleSide,
  });

  const loader = new PLYLoader();
  loader.load(
    `../assets/php/threeJs/land._ply`,
    function (geometry) {
      geometry.computeVertexNormals();
      const mesh = new THREE.Mesh(geometry, material);
      mesh.geometry.translate(
        -data.offsets.land.x,
        -data.offsets.land.y,
        -data.offsets.land.z
      );
      scene.add(mesh);
    },
    (xhr) => {
      console.log((xhr.loaded / xhr.total) * 100 + "% loaded");
    },
    (error) => {
      console.log(error);
    }
  );
  for (let i = 0; i < data.offsets.house.length; i++) {
    loader.load(
      `../assets/php/threeJs/${i}.ply`,
      function (geometry) {
        //+ mat double side
        geometry.computeVertexNormals();
        const mesh = new THREE.Mesh(geometry, material);
        mesh.geometry.translate(
          data.offsets.house[i].x - averageOffset[0],
          data.offsets.house[i].y - averageOffset[1],
          -data.offsets.house[i].z
        );
        scene.add(mesh);
      },
      (xhr) => {
        console.log((xhr.loaded / xhr.total) * 100 + "% loaded");
      },
      (error) => {
        console.log(error);
      }
    );
  }

  window.addEventListener("resize", onWindowResize, false);
  function onWindowResize() {
    camera.aspect = window.innerWidth / window.innerHeight;
    camera.updateProjectionMatrix();
    renderer.setSize(displayTarget.clientWidth, displayTarget.clientHeight);
    render();
  }

  var animate = function () {
    requestAnimationFrame(animate);

    render();
  };

  function render() {
    renderer.render(scene, camera);
  }
  animate();

  function ajaxRequest() {
    return new Promise((res) => {
      const xmlhttpTask = new XMLHttpRequest();

      xmlhttpTask.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          data = JSON.parse(this.response);
          res();
        }
      };

      xmlhttpTask.open("GET", `../assets/php/content.php`, true);
      xmlhttpTask.send();
    });
  }
});
