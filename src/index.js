import * as THREE from "../node_modules/three/build/three.module";
import { OrbitControls } from "../node_modules/three/examples/jsm/controls/OrbitControls";
import { PLYLoader } from "../node_modules/three/examples/jsm/loaders/PLYLoader";

document.addEventListener("DOMContentLoaded", async () => {
  const valueInput = document.getElementById("valueInput");
  const target = document.getElementById("valueTarget");
  valueInput.addEventListener("input", () => {
    target.innerHTML = `${valueInput.value}m²`;
  });

  $("form").submit(function () {
    if ($("input#fake").val().length != 0) {
      return false;
    }
  });

  let data;
  await ajaxRequest();

  console.log();

  const scene = new THREE.Scene();

  var light = new THREE.SpotLight();
  light.position.set(20, 20, 20);
  scene.add(light);

  const camera = new THREE.PerspectiveCamera(
    75,
    window.innerWidth / window.innerHeight,
    1,
    1000
  );

  camera.position.z = 40;

  const renderer = new THREE.WebGLRenderer();
  renderer.outputEncoding = THREE.sRGBEncoding;
  renderer.setSize(window.innerWidth, window.innerHeight);
  document.body.appendChild(renderer.domElement);

  const controls = new OrbitControls(camera, renderer.domElement);

  const loader = new PLYLoader();
  for (let i = 0; i < data.offsets.house.length; i++) {
    loader.load(
      `../assets/threeJs/${i}.ply`,
      function (geometry) {
        geometry.computeVertexNormals();
        const mesh = new THREE.Mesh(geometry);
        mesh.position.x = data.offsets.house[i].x;
        mesh.position.y = data.offsets.house[i].y;
        mesh.position.z = data.offsets.house[i].z;
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
  /* "offsets": {
    "land": { "x": 34.5, "y": 39.0, "z": 100.35485076904297 },
    "house": [
      { "x": -13.5, "y": 5.0, "z": 100.35485076904297 },
      { "x": -13.5, "y": 5.0, "z": 100.35485076904297 },
      { "x": -3.5, "y": 9.0, "z": 100.35485076904297 },
      { "x": -6.5, "y": 5.0, "z": 100.35485076904297 },
      { "x": -6.5, "y": 5.0, "z": 100.35485076904297 },
      { "x": -8.5, "y": 9.0, "z": 100.35485076904297 },
      { "x": -13.5, "y": 9.0, "z": 100.35485076904297 },
      { "x": -13.5, "y": 10.0, "z": 100.35485076904297 },
      { "x": -8.5, "y": 15.0, "z": 100.35485076904297 },
      { "x": -9.5, "y": 15.0, "z": 100.35485076904297 },
      { "x": -0.5, "y": 14.0, "z": 100.35485076904297 },
      { "x": -1.5, "y": 9.0, "z": 100.35485076904297 },
      { "x": -1.5, "y": 9.0, "z": 100.35485076904297 }
    ]
  }, */

  window.addEventListener("resize", onWindowResize, false);
  function onWindowResize() {
    camera.aspect = window.innerWidth / window.innerHeight;
    camera.updateProjectionMatrix();
    renderer.setSize(window.innerWidth, window.innerHeight);
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
